<?php
	
	//公共类文件
	
	//数据库操作类  -- 单表查询类
	class Model{
		
		//主机
		//public $host     = '120.27.149.96';//为啥这个不行啊？
		public $host     = 'localhost';
		public $user     = 'root';
		public $password = 'ymbb1027Ca$$w0rd';
		public $dbname   = 'wechat';//数据库名
		
		//表名
		public $tableName;
		
		//MySQL连接资源
		public $link;
		
		//表中的字段信息
		public $fields=array();
		
		//条件
		private $where='';
		
		//构造方法
		public function __construct($table_name){
			
			$this->tableName = $table_name;//表名
			$this->connect();//连接数据库
			$this->getField();//获取各个字段名
		}
		
		//初始化数据库
		public function connect(){
			//$this->link = mysql_connect('localhost','root','root',true);
			$this->link = mysql_connect($this->host,$this->user,$this->password,true);
		//插入数据库emoji表情小图标
			//mysql_set_charset('utf8');
			mysql_set_charset('utf8mb4');
			//mysql_query("SET NAMES UTF8"); 
			mysql_select_db($this->dbname);
		}
		
		//获取表中的列(字段)信息
		private function getField(){
			$sql="DESC {$this->tableName}";
			$result = mysql_query($sql,$this->link);
			
			if($result !== false  && mysql_num_rows($result)>0){
				while($row = mysql_fetch_assoc($result)){
					$this->fields[] = $row['Field'];
				}
			}
			
			//var_dump($this->fields);
			//var_dump($sql);
			
			
		}
		
		
		/**
		 * 执行增、删、改类型的SQL语句
		 * @return int|boolean 成功返回受影响行数，失败返回false
		 */
		public function execute($sql){
			//清空条件
			$this->where = '';
		
			if(mysql_query($sql)){
				
				//return 3333;
				return mysql_affected_rows($this->link);
			}
			//return mysql_query($sql);
			return false;
			
		}
		
		/**
		 * 执行查询类型的SQL语句
		 * @return array 
		 */
		public function query($sql){
			//清空条件
			$this->where = '';
			
			$result = mysql_query($sql,$this->link);
			$list = array();
			if( $result!== false  && mysql_num_rows($result)>0){
				while($row = mysql_fetch_assoc($result)){
					$list[] = $row;
				}
			}
			return $list;
		}
		
		
		/**
		 * 查询数据
		 * @return array 
		 */
		public function select(){
			$sql = "SELECT * FROM {$this->tableName} {$this->where}";
			return $this->query($sql);
		}
		
		/*
		 * 保存数据到数据库中
		 * @param $data array 需要保存的数据 以关联数组形式传入，key是字段名 value是值
		 * @return int|boolean  成功返回自增id，失败返回false
		 */
		public function insert($data){
			/*
			$data['name'] = 'lily';
			// $data['age'] = '30';
			*/
			
			//return serialize($this->fields);
			
			//安全清理，去除没有的字段
			foreach($data as $key=>$value){
				if( ! in_array($key,$this->fields)){
					unset($data[$key]);
				}
			}
			
			
			//return serialize($data);
			
			/*将key拼接成为sql中的字符串:  name,age  */
			$keys = array_keys($data);
			//$sql_key = implode(',' , $keys);
			$sql_key = '`' . implode('`,`' , $keys) . '`';
			
			/*将value转义后，拼接成为sql中的value部份  'lily','30'  */
			$sql_value = '';
			foreach($data as $v){
				//对值做mysql安全转义
				$v = mysql_real_escape_string($v,$this->link);
				$sql_value .= "'{$v}',";
			}
			$sql_value = rtrim($sql_value , ',');
			
			
			//INSERT INTO stu (name,age) VALUES ('lily','30')
			$sql = "INSERT INTO {$this->tableName} ({$sql_key}) VALUES ({$sql_value})";
			
			//return $sql;
			
			//执行SQL语句
			if($this->execute($sql)==1){
				//返回自增id
				//return $sql;
				return mysql_insert_id($this->link);
			}

			//return print_r( $this->execute($sql), true );//0
			//return $sql;
		    
		    //return print_r( mysql_query($sql), true );
			//return mysql_affected_rows($this->link);
			return false;
		}
		
	//--------------------------------------
		//接收条件
		//$where array
		public function where($where=''){
			//1
			if(empty($where)){
				return $this;
			}
			
			//2
			//字符串直接使用
			if(is_string($where)){
				$this->where = ' where ' . $where;
				
				//返回$this 是为了支持连惯操作
				return $this;
			}
		
		
			//3
			/*
			$where = array(
				'name'=>'lily',
				'sex'=>'1',
			);
			
			
			where name='lily' and sex='1'
			
			*/
			
			$arr = array();
			/*
			array(
				"name='lily'",
				"sex='1'",
			)
			*/
			
			foreach($where as $key=>$value){
				$value = mysql_real_escape_string($value);
				$arr[] = "`$key`='$value'";
			}
			
			if(count($arr)>0){
				//where name='lily' and sex='1'
				$this->where  = " WHERE " . join(' AND ' , $arr);
			}
			
			//返回$this 是为了支持连惯操作
			return $this;
		}
		
	//-----------------------------------------	
		public function update($data){
			/*
			$data['name']='newjack';
			$data['age']=20;
			
			
			update xxx set name='newjack' ,age = '20' where ....
			
			*/
			$arr = array();
			foreach($data as $key=>$value){
				$value = mysql_real_escape_string($value);
				$arr[] = "`$key`='$value'";
			}
			if(count($arr)>0){
				$str = join(',' ,$arr);
			}
			
			$sql = "UPDATE {$this->tableName} SET {$str} {$this->where}";
			//成功返回受影响行数
			return $this->execute($sql);
			//return $sql;
		}
		
	//-----------------------------------------------	
		public function delete($where=null){
			$this->where($where);
			$sql = "DELETE FROM {$this->tableName} {$this->where}";
			return $this->execute($sql);
		}
		
	//------------------------------------------	
		//count  avg  max min...
		/*
		public function max($field){
			$sql = "SELECT MAX($field) as val FROM {$this->tableName} {$this->where}";
			$arr = $this->query($sql);
			if(count($arr)>0){
				return $arr[0]['val'];
			}
		}
		*/
		
		public function __call($method,$params){
			
			$arr = array('max','min','avg','count');

			if( ! in_array(strtolower($method),$arr)){
				trigger_error("Call to undefined method Model::{$method}()" , E_USER_WARNING);
				return;
			}
		
			//允许调用count()时，不传参数
			if(strtolower($method) == 'count' &&  count($params)==0){
				$params[0] = '*';
			}
			
			//echo $method;exit;
			//var_dump($params);exit;
			$field = $params[0];

			$sql = "SELECT {$method}($field) as val FROM {$this->tableName} {$this->where}";
			$arr = $this->query($sql);
			
			if(count($arr)>0){
				return $arr[0]['val'];
			}
		}
	
    }