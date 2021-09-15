<?php
namespace App;
use Illuminate\Database\Eloquent\Model;
use Elasticquent\ElasticquentTrait;

class Student extends Model
{
    use ElasticquentTrait;
    protected $mappingProperties = array(
        'first_name' => array(
            'type' => 'string',
            'analyzer' => 'standard'
        )
    );
    protected $fillable = [
        'first_name','last_name', 'address'
    ];
}
?>