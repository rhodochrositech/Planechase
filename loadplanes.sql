DROP TABLE IF EXISTS planes CASCADE;
DROP TABLE IF EXISTS phenom CASCADE;
DROP TABLE IF EXISTS server CASCADE;

CREATE TABLE server (
    gid INT auto_increment,
    data VARCHAR(10000),
    name VARCHAR(30),
    playerauth VARCHAR(100),
    PRIMARY KEY(gid)
) ENGINE = innodb;

CREATE TABLE phenom (
    phid INT auto_increment,
    name VARCHAR(255),
    dir VARCHAR(255),
    PRIMARY KEY(phid)
) ENGINE = innodb;


CREATE TABLE planes (
    pid INT auto_increment,
    name VARCHAR(255),
    dir VARCHAR(255),
    PRIMARY KEY(pid)
) ENGINE = innodb;

INSERT INTO phenom (phid,name,dir) VALUES
(1,'chaotic aether', 'opca-1-chaotic-aether.jpg'),
(2,'interplanar tunnel', 'opca-2-interplanar-tunnel.jpg'),
(3,'morphic tide', 'opca-3-morphic-tide.jpg'),
(4,'mutual epiphany', 'opca-4-mutual-epiphany.jpg'),
(5,'planewide disaster', 'opca-5-planewide-disaster.jpg'),
(6,'reality shaping', 'opca-6-reality-shaping.jpg'),
(7,'spatial merging', 'opca-7-spatial-merging.jpg'),
(8,'time distortion', 'opca-8-time-distortion.jpg');

INSERT INTO planes (pid,name, dir) VALUES
(10,'the aether flues', 'opca-10-the-aether-flues.jpg'),
(11,'agyrem', 'opca-11-agyrem.jpg'),
(12,'akoum', 'opca-12-akoum.jpg'),
(13,'aretopolis', 'opca-13-aretopolis.jpg'),
(14,'astral arena', 'opca-14-astral-arena.jpg'),
(15,'bant', 'opca-15-bant.jpg'),
(16,'bloodhill bastion', 'opca-16-bloodhill-bastion.jpg'),
(17,'celestine reef', 'opca-17-celestine-reef.jpg'),
(18,'cliffside market', 'opca-18-cliffside-market.jpg'),
(19,'the dark barony', 'opca-19-the-dark-barony.jpg'),
(20,'edge of malacol', 'opca-20-edge-of-malacol.jpg'),
(21,'eloren wilds', 'opca-21-eloren-wilds.jpg'),
(22,'the eon fog', 'opca-22-the-eon-fog.jpg'),
(23,'feeding grounds', 'opca-23-feeding-grounds.jpg'),
(24,'fields of summer', 'opca-24-fields-of-summer.jpg'),
(25,'the fourth sphere', 'opca-25-the-fourth-sphere.jpg'),
(26,'furnace layer', 'opca-26-furnace-layer.jpg'),
(27,'gavony', 'opca-27-gavony.jpg'),
(28,'glen elendra', 'opca-28-glen-elendra.jpg'),
(29,'glimmervoid basin', 'opca-29-glimmervoid-basin.jpg'),
(30,'goldmeadow', 'opca-30-goldmeadow.jpg'),
(31,'grand ossuary', 'opca-31-grand-ossuary.jpg'),
(32,'the great forest', 'opca-32-the-great-forest.jpg'),
(33,'grixis', 'opca-33-grixis.jpg'),
(34,'grove of the dreampods', 'opca-34-grove-of-the-dreampods.jpg'),
(35,'hedron fields of agadeem', 'opca-35-hedron-fields-of-agadeem.jpg'),
(36,'the hippodrome', 'opca-36-the-hippodrome.jpg'),
(37,'horizon boughs', 'opca-37-horizon-boughs.jpg'),
(38,'immersturm', 'opca-38-immersturm.jpg'),
(39,'isle of vesuva', 'opca-39-isle-of-vesuva.jpg'),
(40,'izzet steam maze', 'opca-40-izzet-steam-maze.jpg'),
(41,'jund', 'opca-41-jund.jpg'),
(42,'kessig', 'opca-42-kessig.jpg'),
(43,'kharasha foothills', 'opca-43-kharasha-foothills.jpg'),
(44,'kilnspire district', 'opca-44-kilnspire-district.jpg'),
(45,'krosa', 'opca-45-krosa.jpg'),
(46,'lair of the ashen idol', 'opca-46-lair-of-the-ashen-idol.jpg'),
(47,'lethe lake', 'opca-47-lethe-lake.jpg'),
(48,'llanowar', 'opca-48-llanowar.jpg'),
(49,'the maelstrom', 'opca-49-the-maelstrom.jpg'),
(50,'minamo', 'opca-50-minamo.jpg'),
(51,'mirrored depths', 'opca-51-mirrored-depths.jpg'),
(52,'mount keralia', 'opca-52-mount-keralia.jpg'),
(53,'murasa', 'opca-53-murasa.jpg'),
(54,'naar isle', 'opca-54-naar-isle.jpg'),
(55,'naya', 'opca-55-naya.jpg'),
(56,'nephalia', 'opca-56-nephalia.jpg'),
(57,'norn s dominion', 'opca-57-norn-s-dominion.jpg'),
(58,'onakke catacomb', 'opca-58-onakke-catacomb.jpg'),
(59,'orochi colony', 'opca-59-orochi-colony.jpg'),
(60,'orzhova', 'opca-60-orzhova.jpg'),
(61,'otaria', 'opca-61-otaria.jpg'),
(62,'panopticon', 'opca-62-panopticon.jpg'),
(63,'pools of becoming', 'opca-63-pools-of-becoming.jpg'),
(64,'prahv', 'opca-64-prahv.jpg'),
(65,'quicksilver sea', 'opca-65-quicksilver-sea.jpg'),
(66,'raven s run', 'opca-66-raven-s-run.jpg'),
(67,'sanctum of serra', 'opca-67-sanctum-of-serra.jpg'),
(68,'sea of sand', 'opca-68-sea-of-sand.jpg'),
(69,'selesnya loft gardens', 'opca-69-selesnya-loft-gardens.jpg'),
(70,'shiv', 'opca-70-shiv.jpg'),
(71,'skybreen', 'opca-71-skybreen.jpg'),
(72,'sokenzan', 'opca-72-sokenzan.jpg'),
(73,'stairs to infinity', 'opca-73-stairs-to-infinity.jpg'),
(74,'stensia', 'opca-74-stensia.jpg'),
(75,'stronghold furnace', 'opca-75-stronghold-furnace.jpg'),
(76,'takenuma', 'opca-76-takenuma.jpg'),
(77,'talon gates', 'opca-77-talon-gates.jpg'),
(78,'tazeem', 'opca-78-tazeem.jpg'),
(79,'tember city', 'opca-79-tember-city.jpg'),
(80,'trail of the mage rings', 'opca-80-trail-of-the-mage-rings.jpg'),
(81,'truga jungle', 'opca-81-truga-jungle.jpg'),
(82,'turri island', 'opca-82-turri-island.jpg'),
(83,'undercity reaches', 'opca-83-undercity-reaches.jpg'),
(84,'velis vel', 'opca-84-velis-vel.jpg'),
(85,'windriddle palaces', 'opca-85-windriddle-palaces.jpg'),
(86,'the zephyr maze', 'opca-86-the-zephyr-maze.jpg'),
(9,'academy at tolaria west', 'opca-9-academy-at-tolaria-west.jpg');
SELECT * FROM planes;

