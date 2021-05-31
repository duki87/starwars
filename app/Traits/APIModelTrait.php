<?php 

    namespace App\Traits;

    use App\Helpers\DataHelper;
    use App\Helpers\CollectionHelper;
    use Illuminate\Support\Facades\Http;

    trait APIModelTrait {

        private static $apiData, $apiRelations = [], $apiFilters = [], $apiSort = ['id', 'asc'], $apiPageSize = 0;

        public static function getData()
        {
            $urls = [];
            if(!empty(self::$apiFilters)) {
                $collection = self::$apiFilters[1];
                $id = self::$apiFilters[0];
                $urls = Http::get("https://swapi.dev/api/$collection/$id/")[self::$apiCollection];
            }
            $data = DataHelper::getFromApi(self::$apiCollection, self::$apiClass, $urls);
            foreach(self::$apiRelations as $key => $relation) {
                $data->each(function ($item) use($key, $relation) {
                    $item->{$key} = DataHelper::getFromApi($relation[0], $relation[1], $item->{$key});
                });
            }
            $sorted = CollectionHelper::sortData(self::$apiSort[0], self::$apiSort[1], $data);
            if(self::$apiPageSize != 0) {
               $sorted = CollectionHelper::pagination($sorted, self::$apiPageSize);
            }
            return $sorted;
        } 

        public static function withRelation($relation)
        {
            $model = new self();
            self::$apiRelations[$relation] = $model->{$relation}();
            return new static;
        } 

        public function makeRelation($collection, $model)
        {
            self::$apiRelations[$name] = [$model];
        }


        public static function filterData($id, $collection)
        {
            self::$apiFilters = [$id, $collection];
            return new static;
        }

        public static function paginateData($pageSize)
        {
            self::$apiPageSize = $pageSize;
            return new static;
        }

        public static function sortData($key, $rule)
        {
            self::$apiSort = [$key, $rule];
            return new static;
        }

        public static function findById($id)
        {
            $data = DataHelper::getFromApi(self::$apiCollection, self::$apiClass);
            foreach(self::$apiRelations as $key => $relation) {
                $data->each(function ($item) use($key, $relation) {
                    $item->{$key} = DataHelper::getFromApi($relation[0], $relation[1], $item->{$key});
                });
            }
            $filtered = $data->filter(function($item) use($id) {
                return $item->id == $id;
            });
            return $filtered;
        } 
    }