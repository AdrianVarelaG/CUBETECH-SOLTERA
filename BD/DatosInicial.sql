INSERT INTO `almacenes` (`empresa_id`, `empresasurcusale_id`, `almacentipo_id`, `nombre`, `direccion`, `foraneo`, `maquila`, `activo`, `created`, `modified`) VALUES
( 1, 1, 1, 'CERVECERIA', 'DIRECCIÃ“N cerveceria', 2, 1, 1, '2017-03-17 03:46:26', '2017-03-17 03:46:26'),
( 1, 1, 2, 'cedis slp', 'AV SALVADOR NAVA', 1, 1, 1, '2017-03-17 03:48:36', '2017-03-17 03:50:23');

INSERT INTO `almacenmarcas` ( `empresa_id`, `nombre`, `fechaalta`, `activo`, `created`, `modified`) VALUES
( 1, 'SOLTERA', '2017-03-17', 1, '2017-03-17 15:14:32', '2017-03-17 15:56:35');

INSERT INTO `almacenmateriales` (`empresa_id`, `nombre`, `tipo`, `activo`, `created`, `modified`) VALUES
( 1, 'ETIQUETA', 1, 1, '2017-03-17 13:38:41', '2017-03-17 13:38:41'),
( 1, 'FICHA', 1, 1, '2017-03-17 13:40:44', '2017-03-17 13:40:44'),
( 1, 'BOTELLA', 1, 1, '2017-03-17 13:41:01', '2017-03-17 13:41:01'),
( 1, 'CARTON', 2, 1, '2017-03-17 13:43:35', '2017-03-17 13:44:59'),
( 1, 'TRIPACK', 2, 1, '2017-03-17 13:46:03', '2017-03-17 13:46:03');

INSERT INTO `almacenproductos` ( `empresa_id`, `nombre`, `descripcion`, `almacenmarca_id`, `fechaalta`, `precio`, `activo`, `created`, `modified`) VALUES
( 1, 'HERMOSA', 'BLONDE ALE', 1, '2017-03-17', '30.00', 1, '2017-03-17 17:37:57', '2017-03-17 18:09:07'),
( 1, 'DULCE', 'VANILLA PORTER', 1, '2017-03-17', '30.00', 1, '2017-03-17 17:40:40', '2017-03-17 18:09:22'),
( 1, 'MORENA', 'BLACK IPA', 1, '2017-03-17', '30.00', 1, '2017-03-17 17:56:26', '2017-03-17 17:56:26');

INSERT INTO `almacentipos` (`empresa_id`, `denominacion`, `activo`, `created`, `modified`) VALUES
( 1, 'PRODUCCION', 1, '2017-03-17 02:20:39', '2017-03-17 02:20:39'),
( 1, 'CEDIS', 1, '2017-03-17 02:21:46', '2017-03-17 02:22:22');

INSERT INTO `direpais` ( `denominacion`, `created`, `modified`) VALUES
( 'Mexico', '2017-02-08 14:42:00', '2017-02-08 14:42:00');

INSERT INTO `direprovincias` ( `direpai_id`, `denominacion`, `created`, `modified`) VALUES
( 1, 'San Luis Potosi', '2017-02-08 14:42:50', '2017-02-08 14:42:50');

INSERT INTO `dirmunicipios` ( `direpai_id`, `direprovincia_id`, `denominacion`, `created`, `modified`) VALUES
( 1, 1, 'San Luis Potosi', '2017-02-13 12:19:36', '2017-02-13 12:19:36');

INSERT INTO `empresas` ( `cuit`, `razon_social`, `email`, `telefono`, `website`, `direpai_id`, `direprovincia_id`, `direccion`, `created`, `modified`) VALUES
( 'CSL161204PRD', 'cerveza', 'hola@cervezasoltera.com', '8888888', 'http://www.cervezasoltera.com', 1, 1, 'CERVEZA SOLTERAÂ®', '2017-03-16 20:49:49', '2017-03-17 01:04:34');

INSERT INTO `empresasurcusales` ( `empresa_id`, `denominacion`, `telefono`, `email`, `direccion`, `created`, `modified`) VALUES
( 1, 'SLP', '111111', '1@1.com', '1', '2017-03-17 03:44:56', '2017-03-17 03:44:56');

INSERT INTO `modulos` (`denominacion`, `created`, `modified`) VALUES
( 'configuracion', '2017-01-18 16:04:06', '2017-01-18 16:04:06'),
( 'Usuarios', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
( 'Sucursales', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
( 'Clientes', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
( 'Almacen/Inventario', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
( 'Ventas', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
( 'Reportes', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
( 'Graficas', '0000-00-00 00:00:00', '0000-00-00 00:00:00');

INSERT INTO `rolemodulos` (`role_id`, `modulo_id`, `created`, `modified`) VALUES
( 1, 1, '2017-01-18 23:21:28', '2017-01-18 23:21:28'),
( 1, 2, '2017-02-08 16:54:59', '2017-02-08 16:54:59'),
( 1, 3, '2017-02-08 16:55:10', '2017-02-08 16:55:10'),
( 2, 2, '2017-02-08 16:55:20', '2017-02-08 16:55:20'),
( 2, 3, '2017-02-08 16:55:32', '2017-02-08 16:55:32'),
( 1, 4, '2017-02-13 12:26:25', '2017-02-13 12:26:25'),
( 2, 4, '2017-02-13 12:26:34', '2017-02-13 12:26:34'),
( 3, 4, '2017-02-13 12:26:48', '2017-02-13 12:26:48'),
( 4, 4, '2017-02-13 12:27:46', '2017-02-13 12:27:46'),
( 1, 5, '2017-02-14 15:15:23', '2017-02-14 15:15:23'),
( 2, 5, '2017-02-14 15:15:33', '2017-02-14 15:15:33'),
( 3, 5, '2017-02-14 15:15:42', '2017-02-14 15:15:42'),
( 1, 6, '2017-02-20 17:03:50', '2017-02-20 17:03:50'),
( 2, 6, '2017-02-20 17:04:00', '2017-02-20 17:04:00'),
( 3, 6, '2017-02-20 17:04:09', '2017-02-20 17:04:09'),
( 4, 6, '2017-02-20 17:04:20', '2017-02-20 17:04:20'),
( 3, 2, '2017-03-03 22:47:56', '2017-03-03 22:47:56'),
( 1, 7, '2017-03-13 14:09:03', '2017-03-13 14:09:03'),
( 1, 8, '2017-03-13 14:09:12', '2017-03-13 14:09:12'),
( 2, 7, '2017-03-13 14:09:25', '2017-03-13 14:09:25'),
( 2, 8, '2017-03-13 14:09:37', '2017-03-13 14:09:37'),
( 3, 7, '2017-03-13 14:09:48', '2017-03-13 14:09:48'),
( 3, 8, '2017-03-13 14:09:58', '2017-03-13 14:09:58'),
( 5, 5, '2017-03-16 20:54:32', '2017-03-16 20:54:32'),
( 6, 8, '2017-03-17 01:29:06', '2017-03-17 01:29:06');

INSERT INTO `roles` ( `title`, `alias`, `created`, `modified`) VALUES
( 'Super root', 'Super root', '2017-01-18', '2017-01-18'),
( 'root', 'root', '2017-01-18', '2017-01-18'),
( 'administrador', 'administrador', NULL, NULL),
( 'vendedor', 'vendedor', '2017-02-13', '2017-02-13'),
( 'ALMACEN', 'ALMACEN', '2017-03-16', '2017-03-16'),
( 'Socio', 'SOCIO', '2017-03-17', '2017-03-17');

INSERT INTO `users` (`username`, `password`, `role_id`, `empresa_id`, `empresasurcusale_id`, `nombres_apellidos`, `email`, `website`, `bio`, `status`, `modified`, `created`) VALUES
( 'superroot', '81dc9bdb52d04dc20036dbd8313ed055', 	1, 1, 0, 'Cesar Varela', 'cesarv@cubetechnologies.com.mx', 'jcloudtec.com', '', 1, '2017-03-16', '0000-00-00 00:00:00'),
( 'joaquin', '0781de9d819a84429a41407835eb7d3f', 	3, 1, 1, 'Joaquin Navarro', 'prodis@hotmail.com', NULL, 'Socio', 1, '2017-03-17', '2017-03-16 21:12:45'),
( 'EMANUEL', '482f2dfe693763ec141950030f0bc4ca', 	3, 1, 1, 'Emanuel Navarro', 'emanuel@hotmail.com', NULL, 'CO-FUNDADOR', 1, '2017-03-17', '2017-03-17 01:16:57'),
( 'OSCAR', '46c1f5cb00db52b8934f427619cef066', 		4, 1, 1, 'Oscar godinez', 'oscargodinez@hotmail.com', NULL, 'Vendedor estrella', 1, '2017-03-17', '2017-03-17 01:22:37'),
( 'LEONARDO', '1b75d622efb29a275d9e59586a0f271a', 	6, 1, 1, 'Leonardo', 'leonardo@hotmail.com', NULL, 'Socio', 1, '2017-03-17', '2017-03-17 01:30:29'),
( 'dolores', '822628616b01bc6d585734fa1f80cd57', 	5, 1, 1, 'Dolores', 'dolores@hotmail.com', NULL, 'aLMACEN', 1, '2017-03-17', '2017-03-17 01:31:30'),
( 'cesar', 'fb82e6f762c6465daef75a1437c2a232', 		6, 1, 1, 'Cesar', 'cesar@hotmail.com', NULL, 'CESAR', 1, '2017-03-17', '2017-03-17 01:33:01'),
( 'jorge', 'f5b90f3967e0eff33d07b089087a9c42', 		6, 1, 1, 'Jorge', 'jorge@hotmail.com', NULL, 'jorge', 1, '2017-03-17', '2017-03-17 01:34:01');

INSERT INTO `almacenmarcadetalles` (`almacenmarca_id`, `almacenmateriale_id`, `cantidad`, `default`, `created`, `modified`) VALUES
( 1, 4, 24.00, 1, 1490295820, 1490295820),
( 1, 5, 3.00, 0, 1490295820, 1490295820);

INSERT INTO `almacenusers` (`empresa_id`, `empresasurcusale_id`, `almacentipo_id`, `almacene_id`, `user_id`, `created`, `modified`) VALUES
( 1, 1, 1, 1, 2, '2017-03-24 10:50:50', '2017-03-24 10:50:50'),
( 1, 1, 1, 1, 3, '2017-03-24 10:51:07', '2017-03-24 10:51:07'),
( 1, 1, 2, 2, 2, '2017-03-24 10:55:11', '2017-03-24 10:55:11'),
( 1, 1, 2, 2, 3, '2017-03-24 10:55:30', '2017-03-24 10:55:30'),
( 1, 1, 2, 2, 6, '2017-03-24 10:56:02', '2017-03-24 10:56:02'),
( 1, 1, 2, 2, 4, '2017-03-24 10:56:25', '2017-03-24 10:56:25');

INSERT INTO `almacenproductodetalles` (`almacenproducto_id`, `almacenmateriale_id`, `cantidad`, `created`, `modified`) VALUES
( 1, 1, 1.00, '2017-03-24 10:19:10', '2017-03-24 10:19:10'),
( 2, 1, 1.00, '2017-03-24 11:05:03', '2017-03-24 11:05:03'),
( 3, 1, 1.00, '2017-03-24 11:05:17', '2017-03-24 11:05:17');

