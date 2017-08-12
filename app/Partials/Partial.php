<?php

namespace App\Partials;

use \Illuminate\Database\Eloquent\Builder;
use \Illuminate\Http\Request;

abstract class Partial
{
	protected $builder;
	protected $requestedPartial;

    public function __construct(array $fields = []){
        $this->requestedPartial = !$fields ? request()->fields : $fields;
    }

    public function apply(Builder $builder)
    {
        $this->builder = $builder;

        $fields = $this->transformFormat($this->requestedPartial);


        foreach($fields  as $key => $value){
            $method_name = is_array($value) ? $key : $value;
            $param = is_array($value) ? $value : null;

            $method_name = camel_case($method_name) . 'Partial';
            if(method_exists($this, $method_name)) $this->$method_name($param);
        }

        return $builder;
    }


    /**
     * @param $fields
     * @return array
     * Example change string below
     * title,id,user(name,email)
     * TO
     * [
     *   'id',
     *   'title',
     *   'user' => ['name', 'id']
     * ]
     */
    private function transformFormat($fields)
	{
		if(is_array($fields)) return $fields;

        $commaBetweenParentheses = "|,(?=[^\(]*\))|";

        $string = preg_replace($commaBetweenParentheses, '###', $fields);
        $array = explode(',', $string);

        $stringFollowedByParentheses = '|(.+)\((.+)\)|';
        $final = [];
        foreach ($array as $value) {

            preg_match($stringFollowedByParentheses, $value, $result);

            if(!empty($result))
            {
                $final[$result[1]] = explode('###', $result[2]);
            }
            if(empty($result) && !in_array($value, $final)){
                $final[] = $value;
            }
        }
		return $final;
	}
}