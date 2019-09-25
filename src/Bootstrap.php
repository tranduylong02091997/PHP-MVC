<?php
namespace AHT;

use Doctrine\ORM\Tools\Setup;
use Doctrine\ORM\EntityManager;

class Bootstrap
{
    static public function getEntityManager(){
        $isDevMode = true;
		$config = Setup::createAnnotationMetadataConfiguration(array(__DIR__."/Models"), $isDevMode);//tạo cấu hình entities siêu dữ liệu bằng chú thích
		//khoi tạo cau hình orm sử dụng trình trợ giúp setup
		
		// database configuration parameters các tùy chọn để kết nốt csdl
		$conn = array(
			'driver'   => 'pdo_mysql',
			'user'     => 'root',
			'password' => '',
			'dbname'   => 'doctrine_mvc',
		);
		$config->addEntityNamespace('', 'src\Models');
	
		// obtaining the entity manager
		return $entityManager = EntityManager::create($conn, $config);
		//bất cứ khi nào ta muốn lưu trữ dữ liệu
		// vào database	thì phải thông qua EntitysManager
		
    }
    
}
