<?php

/**
 * This is the model class for table "terminal_fee".
 *
 * The followings are the available columns in table 'terminal_fee':
 * @property integer $id
 * @property integer $voyage
 * @property integer $shipping_lines
 * @property integer $passenger
 * @property string $ticket_no
 * @property string $transaction_no
 * @property string $barcode
 * @property integer $passenger_type
 * @property string $price_paid
 * @property integer $status
 * @property integer $created_by
 * @property string $date_created
 *
 * The followings are the available model relations:
 * @property Passenger $passenger0
 * @property ShippingLines $shippingLines
 * @property Status $status0
 */
class TerminalFee extends CActiveRecord
{
    public $last_name;
    public $first_name;
    public $age;
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'terminal_fee';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('passenger, barcode, passenger_type', 'required'),
			array('voyage, shipping_lines, passenger, passenger_type, status, created_by', 'numerical', 'integerOnly'=>true),
			array('ticket_no, transaction_no,checkin_time, barcode', 'length', 'max'=>100),
			array('price_paid', 'length', 'max'=>20),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, voyage,last_name,first_name, shipping_lines, passenger, ticket_no, transaction_no, barcode, passenger_type, price_paid, status, created_by, date_created', 'safe', 'on'=>'search'),
		);
	}

	/**
	 * @return array relational rules.
	 */
	public function relations()
	{
		// NOTE: you may need to adjust the relation name and the related
		// class name for the relations automatically generated below.
		return array(
			'passenger0' => array(self::BELONGS_TO, 'Passenger', 'passenger'),
			'passengerType' => array(self::BELONGS_TO, 'PassengerType', 'passenger_type'),
			'shippingLines' => array(self::BELONGS_TO, 'ShippingLines', 'shipping_lines'),
			'status0' => array(self::BELONGS_TO, 'Status', 'status'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'voyage' => 'Voyage',
			'shipping_lines' => 'Shipping Lines',
			'passenger' => 'Passenger',
			'ticket_no' => 'Ticket No',
			'transaction_no' => 'Transaction No',
			'barcode' => 'Barcode',
			'passenger_type' => 'Passenger Type',
			'price_paid' => 'Amount',
			'status' => 'Status',
			'created_by' => 'Created By',
			'date_created' => 'Date Created',
			'last_name' => 'Last Name',
			'first_name' => 'First Name',
			'age' => 'Age',
		);
	}

	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 *
	 * Typical usecase:
	 * - Initialize the model fields with values from filter form.
	 * - Execute this method to get CActiveDataProvider instance which will filter
	 * models according to data in model fields.
	 * - Pass data provider to CGridView, CListView or any similar widget.
	 *
	 * @return CActiveDataProvider the data provider that can return the models
	 * based on the search/filter conditions.
	 */
	public function search()
	{
		// @todo Please modify the following code to remove attributes that should not be searched.

		$criteria=new CDbCriteria;
                $criteria->with=array(
                  'passenger0'=>array(
                    'together'=>false,
                    'select'=>false
                  ),
                );

		$criteria->compare('id',$this->id);
		$criteria->compare('voyage',$this->voyage);
		$criteria->compare('shipping_lines',$this->shipping_lines);
		$criteria->compare('passenger',$this->passenger);
		$criteria->compare('ticket_no',$this->ticket_no,true);
		$criteria->compare('transaction_no',$this->transaction_no,true);
		$criteria->compare('barcode',$this->barcode,true);
		$criteria->compare('passenger_type',$this->passenger_type);
		$criteria->compare('price_paid',$this->price_paid,true);
		$criteria->compare('status',$this->status);
		$criteria->compare('created_by',$this->created_by);
		$criteria->compare('date_created',$this->date_created,true);
                $criteria->compare('passenger.first_name',$this->first_name,true);
                $criteria->compare('passenger.last_name',$this->last_name,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
                  'sort'=>array(
                    'attributes'=>array(
                      'passenger.first_name'=>array(
                        'asc'=>'passenger.first_name',
                        'desc'=>'passenger.first_name DESC'
                      ),
                      'passenger.last_name'=>array(
                        'asc'=>'passenger.last_name',
                        'desc'=>'passenger.last_name DESC'
                      ),
                      'passenger.age'=>array(
                        'asc'=>'passenger.age',
                        'desc'=>'passenger.age DESC'
                      ),
                      '*',
                    )
                  ),
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return TerminalFee the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
