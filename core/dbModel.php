<?php

namespace app\core;

use app\models\Customer;
use app\models\vehicle_complaint_resolve_notification;
use app\models\owner;


abstract class dbModel extends Model
{
    abstract public static function tableName(): string;

    abstract public function attributes():array;
    abstract public static function primaryKey(): string;


    public function save(): bool
    {
        $tableName = static::tableName();
        $attributes = $this->attributes();
        $params = array_map(fn($attr) => ":$attr", $attributes);

        $statement = self::prepare("INSERT INTO $tableName (".implode(',',$attributes).") 
        VALUES(".implode(',',$params).")");

        foreach ($attributes as $attribute) {
            $statement->bindValue(":$attribute", $this->{$attribute});
        }

        $statement->execute();
        return true;

    }

    public function saveAs($excludeAttributes = []): bool
    {
        $tableName = static::tableName();
        $attributes = array_diff($this->attributes(), $excludeAttributes);
        $params = array_map(fn($attr) => ":$attr", $attributes);

        $statement = self::prepare("INSERT INTO $tableName (".implode(',',$attributes).") 
        VALUES(".implode(',',$params).")");

        foreach ($attributes as $attribute) {
            $statement->bindValue(":$attribute", $this->{$attribute});
        }

        $statement->execute();
        return true;
    }

    public function update($id, $Include=[], $Exclude = []): bool
    {
        $tableName = static::tableName();
        $attributes = $this->attributes();
        $params = array_map(fn($attr) => ":$attr", $attributes);

        $demo = 'UPDATE ' . $tableName . ' SET ';
        if (!empty($Include)) :
            foreach ($Include as $attribute) {
                $demo .= $attribute . '="' . $this->{$attribute} . '", ';
            }
        else :
        foreach ($attributes as $attribute) {
            if ($attribute == static::PrimaryKey()) {
                continue;
            }
            if (in_array($attribute, $Exclude)) {
                continue;
            }
            $demo .= $attribute . '="' . $this->{$attribute} . '", ';
        }
        endif;
        $demo=substr($demo,0,-2);
        $demo.=' WHERE '.static::PrimaryKey().'="'.$id.'"';
        $statement=self::prepare($demo);

        foreach ($attributes as $attribute) {
            $statement->bindValue(":$attribute", $this->{$attribute});
        }

        $statement->execute();
        return true;

    }

    public static function findOne($where)
    {
        $tableName = static::tableName();
        $attributes = array_keys($where);
        $sql = implode("AND ", array_map(fn($attr) => "$attr = :$attr", $attributes));
        $statement = self::prepare("SELECT * FROM $tableName WHERE $sql");
        foreach ($where as $key => $item) {
            $statement->bindValue(":$key", $item);
        }

        $statement->execute();

        return $statement->fetchObject(static::class);
    }

    public static function retrieveAll($where = [])
    {
        $tableName = static::tableName();
        $statement = '';
        if (empty($where)) {
            $statement = self::prepare("SELECT * FROM $tableName");
        } else {
            $attributes = array_keys($where);
            $sql = implode("AND ", array_map(fn($attr) => "$attr = :$attr", $attributes));
            $statement = self::prepare("SELECT * FROM $tableName WHERE $sql");
            foreach ($where as $key => $item) {
                $statement->bindValue(":$key", $item);
            }
        }

        $statement->execute();
        return $statement->fetchAll(\PDO::FETCH_CLASS, static::class);

    }

    public static function findBetweenDates($date, $voId)
    {
        $tableName = static::tableName();
        $statement = self::prepare("SELECT * FROM $tableName WHERE startDate <= :date AND endDate >= :date AND vo_Id = :voId");
        $statement->bindValue(":date", $date);
        $statement->bindValue(":voId", $voId);
        $statement->execute();
        return $statement->fetchAll(\PDO::FETCH_CLASS, static::class);
    }

    public function delete(): bool
    {
        $tableName = static::tableName();
        $primaryKey = static::primaryKey();

        $statement = self::prepare("DELETE FROM $tableName WHERE $primaryKey = :id");
        $statement->bindValue(':id', $this->{$primaryKey});

        $statement->execute();

        return true;
    }

    public static function findWhere($where)
    {
        $tableName = static::tableName();
        $conditions = [];
        $bindings = [];

        foreach ($where as $key => $value) {
            $conditions[] = "$key = :$key";
            $bindings[":$key"] = $value;
        }

        $sql = implode(" AND ", $conditions);
        $statement = self::prepare("SELECT * FROM $tableName WHERE $sql");

        foreach ($bindings as $key => $value) {
            $statement->bindValue($key, $value);
        }

        $statement->execute();

        return $statement->fetchObject(static::class);
    }

     public function deleteOne($id): bool
     {
         $tableName = static::tableName();
         $primaryKey = static::primaryKey();

         $statement = self::prepare("DELETE FROM $tableName WHERE $primaryKey = :id");
         $statement->bindValue(':id', $id);

         $statement->execute();
         return true;
     }

    public static function sumColumn($column, $where = [])
    {
        $tableName = static::tableName();
        $statement = '';

        if (empty($where)) {
            $statement = self::prepare("SELECT SUM($column) FROM $tableName");
        } else {
            $attributes = array_keys($where);
            $sql = implode("AND ", array_map(fn($attr) => "$attr = :$attr", $attributes));
            $statement = self::prepare("SELECT SUM($column) FROM $tableName WHERE $sql");
            foreach ($where as $key => $item) {
                $statement->bindValue(":$key", $item);
            }
        }

        $statement->execute();
        return $statement->fetchColumn();
    }


    public static function prepare($sql)
    {
        return Application::$app->db->pdo->prepare($sql);
    }



}