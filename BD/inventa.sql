
CREATE TABLE IF NOT EXISTS `almacenes` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `empresa_id` int(11) NOT NULL,
  `empresasurcusale_id` int(11) NOT NULL,
  `almacentipo_id` int(11) NOT NULL,
  `nombre` varchar(200) NOT NULL,
  `direccion` varchar(1000) NOT NULL,
  `foraneo` int(1) NOT NULL,
  `maquila` int(1) NOT NULL,
  `activo` int(11) NOT NULL DEFAULT '1',
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `almacenmarcadetalles`
--

CREATE TABLE IF NOT EXISTS `almacenmarcadetalles` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `almacenmarca_id` int(11) NOT NULL,
  `almacenmateriale_id` int(11) NOT NULL,
  `cantidad` decimal(26,2) NOT NULL,
  `default` int(11) NOT NULL,
  `created` int(11) NOT NULL,
  `modified` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `almacenmarcas`
--

CREATE TABLE IF NOT EXISTS `almacenmarcas` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `empresa_id` int(11) NOT NULL,
  `nombre` varchar(200) NOT NULL,
  `fechaalta` date NOT NULL,
  `activo` int(11) NOT NULL DEFAULT '1',
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `almacenmateriales`
--

CREATE TABLE IF NOT EXISTS `almacenmateriales` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `empresa_id` int(11) NOT NULL,
  `nombre` varchar(200) NOT NULL,
  `tipo` int(11) NOT NULL,
  `activo` int(11) NOT NULL DEFAULT '1',
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `almacenproductodetalles`
--

CREATE TABLE IF NOT EXISTS `almacenproductodetalles` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `almacenproducto_id` int(11) NOT NULL,
  `almacenmateriale_id` int(11) NOT NULL,
  `cantidad` decimal(26,2) NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `almacenproductos`
--

CREATE TABLE IF NOT EXISTS `almacenproductos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `empresa_id` int(11) NOT NULL,
  `nombre` varchar(200) NOT NULL,
  `descripcion` varchar(1000) NOT NULL,
  `almacenmarca_id` int(11) NOT NULL,
  `fechaalta` date NOT NULL,
  `precio` decimal(26,2) NOT NULL,
  `activo` int(11) NOT NULL DEFAULT '1',
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `almacentipos`
--

CREATE TABLE IF NOT EXISTS `almacentipos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `empresa_id` int(11) NOT NULL,
  `denominacion` varchar(200) NOT NULL,
  `activo` int(11) NOT NULL DEFAULT '1',
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `almacenusers`
--

CREATE TABLE IF NOT EXISTS `almacenusers` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `empresa_id` int(11) NOT NULL,
  `empresasurcusale_id` int(11) NOT NULL,
  `almacentipo_id` int(11) NOT NULL,
  `almacene_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `clientes`
--

CREATE TABLE IF NOT EXISTS `clientes` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `empresa_id` int(11) NOT NULL,
  `empresasurcusale_id` int(11) NOT NULL,
  `nombre` varchar(200) NOT NULL,
  `user_id` int(11) NOT NULL,
  `telefono` varchar(10) NOT NULL,
  `celular` varchar(10) NOT NULL,
  `nombre_contacto` varchar(200) NOT NULL,
  `email` varchar(200) NOT NULL,
  `fecha_alta` date NOT NULL,
  `requiere_factura` int(1) NOT NULL,
  `razon_social` varchar(200) DEFAULT NULL,
  `calle` varchar(200) DEFAULT NULL,
  `numero_exterior` varchar(200) DEFAULT NULL,
  `numero_interior` varchar(200) DEFAULT NULL,
  `cod_postal` int(11) DEFAULT NULL,
  `colonia` varchar(200) NOT NULL,
  `rfc` varchar(13) DEFAULT NULL,
  `direpai_id` int(11) DEFAULT NULL,
  `direprovincia_id` int(11) DEFAULT NULL,
  `dirmunicipio_id` int(11) DEFAULT NULL,
  `activo` int(11) NOT NULL DEFAULT '1',
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `direpais`
--

CREATE TABLE IF NOT EXISTS `direpais` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `denominacion` varchar(300) NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id` (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `direpais`
--


-- --------------------------------------------------------

--
-- Table structure for table `direprovincias`
--

CREATE TABLE IF NOT EXISTS `direprovincias` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `direpai_id` int(11) NOT NULL,
  `denominacion` varchar(300) NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id` (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `direprovincias`
--


-- --------------------------------------------------------

--
-- Table structure for table `dirmunicipios`
--

CREATE TABLE IF NOT EXISTS `dirmunicipios` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `direpai_id` int(11) NOT NULL,
  `direprovincia_id` int(11) NOT NULL,
  `denominacion` varchar(200) NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=1;

--
-- Dumping data for table `dirmunicipios`
--


-- --------------------------------------------------------

--
-- Table structure for table `empresas`
--

CREATE TABLE IF NOT EXISTS `empresas` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `cuit` varchar(300) NOT NULL,
  `razon_social` varchar(300) NOT NULL,
  `email` varchar(200) NOT NULL,
  `telefono` varchar(100) NOT NULL,
  `website` varchar(200) NOT NULL,
  `direpai_id` int(11) NOT NULL,
  `direprovincia_id` int(11) NOT NULL,
  `direccion` varchar(300) NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id` (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `empresasurcusales`
--

CREATE TABLE IF NOT EXISTS `empresasurcusales` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `empresa_id` int(11) NOT NULL,
  `denominacion` varchar(200) NOT NULL,
  `telefono` varchar(200) NOT NULL,
  `email` varchar(200) NOT NULL,
  `direccion` text NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `Inventariomovimateriales`
--

CREATE TABLE IF NOT EXISTS `Inventariomovimateriales` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `empresa_id` int(11) NOT NULL,
  `empresasurcusale_id` int(11) NOT NULL,
  `almacentipo_id` int(11) NOT NULL,
  `almacene_id` int(11) NOT NULL,
  `almacenmateriale_id` int(11) NOT NULL,
  `tipo` int(11) NOT NULL,
  `cantidad` int(11) NOT NULL,
  `fechaalta` date NOT NULL,
  `usermovi_id` int(11) NOT NULL,
  `inventariomovimiento_id` int(11) NOT NULL,
  `activo` int(11) NOT NULL DEFAULT '1',
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `Inventariomovimientos`
--

CREATE TABLE IF NOT EXISTS `Inventariomovimientos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `empresa_id` int(11) NOT NULL,
  `empresasurcusale_id` int(11) NOT NULL,
  `almacentipo_id` int(11) NOT NULL,
  `almacene_id` int(11) NOT NULL,
  `almacenproducto_id` int(11) NOT NULL,
  `tipo` int(11) NOT NULL,
  `tipo_transferencia` int(11) NOT NULL DEFAULT '0',
  `cantidad` int(11) NOT NULL,
  `almacentipofunte_id` int(11) DEFAULT NULL,
  `almacenefunte_id` int(11) DEFAULT NULL,
  `fechaalta` date NOT NULL,
  `referencia` varchar(1000) NOT NULL,
  `ordenventa_id` int(11) NOT NULL,
  `userventa_id` int(11) NOT NULL,
  `activo` int(11) NOT NULL DEFAULT '1',
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `modulos`
--

CREATE TABLE IF NOT EXISTS `modulos` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `denominacion` varchar(300) NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id` (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `modulos`
--

-- --------------------------------------------------------

--
-- Table structure for table `rolemodulos`
--

CREATE TABLE IF NOT EXISTS `rolemodulos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `role_id` int(11) NOT NULL,
  `modulo_id` int(11) NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;


-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE IF NOT EXISTS `roles` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `alias` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created` date DEFAULT NULL,
  `modified` date DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `role_alias` (`alias`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

--
-- Dumping data for table `roles`

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(20) NOT NULL AUTO_INCREMENT,
  `username` varchar(60) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `role_id` int(11) NOT NULL DEFAULT '0',
  `empresa_id` int(11) NOT NULL DEFAULT '0',
  `empresasurcusale_id` int(11) DEFAULT '0',
  `nombres_apellidos` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `website` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `bio` text COLLATE utf8_unicode_ci,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `activo` int(11) NOT NULL DEFAULT '1',
  `modified` date NOT NULL,
  `created` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

--
-- Dumping data for table `users`
--

-- --------------------------------------------------------

--
-- Table structure for table `ventadetalles`
--

CREATE TABLE IF NOT EXISTS `ventadetalles` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `venta_id` int(11) NOT NULL,
  `almacenproducto_id` int(11) NOT NULL,
  `cantidad` decimal(26,2) NOT NULL,
  `existencia` decimal(26,2) NOT NULL,
  `precio` decimal(26,2) NOT NULL,
  `total` decimal(26,2) NOT NULL,
  `embalaje` int(11) NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  UNIQUE KEY `id` (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `ventas`
--

CREATE TABLE IF NOT EXISTS `ventas` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `empresa_id` int(11) NOT NULL,
  `empresasurcusale_id` int(11) NOT NULL,
  `cliente_id` int(11) NOT NULL,
  `informacion` text NOT NULL,
  `user_id` int(11) NOT NULL,
  `almacentipo_id` int(11) NOT NULL,
  `almacene_id` int(11) NOT NULL,
  `tipo` int(11) NOT NULL,
  `fecha` date NOT NULL,
  `pagado` int(11) NOT NULL DEFAULT '2' COMMENT 'Es un campo con valores permitidos [SI|NO] no puede editarse y el valor inicial es NO.',
  `fecha_pagado` date NOT NULL DEFAULT '0000-00-00',
  `total` decimal(26,2) NOT NULL,
  `estado` int(11) NOT NULL COMMENT '1) Registrado 2) Pendiente Autorizar 3) Entregado',
  `activo` int(11) NOT NULL DEFAULT '1',
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

