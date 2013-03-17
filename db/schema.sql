
CREATE TABLE `user` (
 `id_user` int(10) unsigned NOT NULL AUTO_INCREMENT,
 `email` varchar(255) NOT NULL,
 `password` varchar(32) NOT NULL,
 `roles` SET('ROLE_ADMIN','ROLE_WRITER') NOT NULL DEFAULT 'ROLE_WRITER',
 `status` enum('active','inactive') DEFAULT 'inactive',
 PRIMARY KEY (`id_user`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
INSERT INTO `user` VALUES( NULL, 'test@test.com', 'password', 'ROLE_ADMIN', 'active' );
