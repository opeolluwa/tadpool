<?php

namespace app\models;

use Ramsey\Uuid\Uuid;
use Yii;

/**
 * This is the model class for table "customers".
 *
 * @property string $id
 * @property string|null $customer_name
 * @property string|null $address
 * @property string $status
 */
class Customers extends \yii\db\ActiveRecord
{

    /**
     * ENUM field values
     */
    const STATUS_APPROVED = 'approved';
    const STATUS_PENDING = 'pending';
    const STATUS_BLOCKED = 'blocked';
    const STATUS_REVOKED = 'revoked';

    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'customers';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['customer_name', 'address'], 'default', 'value' => null],
            [['status'], 'default', 'value' => 'pending'],
            [['status'], 'string'],
            [['id'], 'string', 'max' => 36],
            [['customer_name', 'address'], 'string', 'max' => 255],
            ['status', 'in', 'range' => array_keys(self::optsStatus())],
            [['id'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'customer_name' => 'Customer Name',
            'address' => 'Address',
            'status' => 'Status',
        ];
    }


    public function beforeSave($insert)
    {
        if ($insert) {
            $this->id = Uuid::uuid4()->toString();
        }
        return parent::beforeSave($insert);
    }

    /**
     * column status ENUM value labels
     * @return string[]
     */
    public static function optsStatus()
    {
        return [
            self::STATUS_APPROVED => 'approved',
            self::STATUS_PENDING => 'pending',
            self::STATUS_BLOCKED => 'blocked',
            self::STATUS_REVOKED => 'revoked',
        ];
    }

    /**
     * @return string
     */
    public function displayStatus()
    {
        return self::optsStatus()[$this->status];
    }

    /**
     * @return bool
     */
    public function isStatusApproved()
    {
        return $this->status === self::STATUS_APPROVED;
    }

    public function setStatusToApproved()
    {
        $this->status = self::STATUS_APPROVED;
    }

    /**
     * @return bool
     */
    public function isStatusPending()
    {
        return $this->status === self::STATUS_PENDING;
    }

    public function setStatusToPending()
    {
        $this->status = self::STATUS_PENDING;
    }

    /**
     * @return bool
     */
    public function isStatusBlocked()
    {
        return $this->status === self::STATUS_BLOCKED;
    }

    public function setStatusToBlocked()
    {
        $this->status = self::STATUS_BLOCKED;
    }

    /**
     * @return bool
     */
    public function isStatusRevoked()
    {
        return $this->status === self::STATUS_REVOKED;
    }

    public function setStatusToRevoked()
    {
        $this->status = self::STATUS_REVOKED;
    }
}
