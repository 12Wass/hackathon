-- phpMyAdmin SQL Dump
-- version 4.9.3
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost:3306
-- Généré le :  ven. 19 mars 2021 à 19:47
-- Version du serveur :  5.7.26
-- Version de PHP :  7.4.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Base de données :  `hackathon`
--

-- --------------------------------------------------------

--
-- Structure de la table `annuaire`
--

CREATE TABLE `annuaire` (
                            `id` int(11) NOT NULL,
                            `region_id` int(11) DEFAULT NULL,
                            `first_name` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
                            `last_name` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
                            `phone` varchar(10) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
                            `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
                            `function` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
                            `created_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `annuaire`
--

INSERT INTO `annuaire` (`id`, `region_id`, `first_name`, `last_name`, `phone`, `email`, `function`, `created_at`) VALUES
(1, 1, 'Jean', 'Pierre', 'NA', 'aucun', 'Aucune', '2021-03-19 00:10:47');

-- --------------------------------------------------------

--
-- Structure de la table `annuaire_regions`
--

CREATE TABLE `annuaire_regions` (
                                    `id` int(11) NOT NULL,
                                    `name` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
                                    `created_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `annuaire_regions`
--

INSERT INTO `annuaire_regions` (`id`, `name`, `created_at`) VALUES
(1, 'Ile de france', '2021-03-19 00:10:28');

-- --------------------------------------------------------

--
-- Structure de la table `answer`
--

CREATE TABLE `answer` (
                          `id` int(11) NOT NULL,
                          `created_at` datetime NOT NULL,
                          `text` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
                          `first` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `answer`
--

INSERT INTO `answer` (`id`, `created_at`, `text`, `first`) VALUES
(354, '2021-03-18 22:37:31', 'Bonjour, je suis Dominique.', 1),
(355, '2021-03-18 22:37:31', 'Je suis à votre disposition pour vous orienter et vous aider dans votre parcours professionnel', 1),
(356, '2021-03-18 22:37:31', 'Que souhaitez-vous faire ?', 1),
(357, '2021-03-18 22:37:31', 'Me former', 0),
(358, '2021-03-18 22:37:31', 'Sélectionnez parmi ces choix dans quel but souhaitez-vous vous former ?', 0),
(359, '2021-03-18 22:37:31', 'Pour acquérir des compétences en lien avec mon poste de travail actuel', 0),
(360, '2021-03-18 22:37:31', 'Je vous de consulter le catalogue de l offre ministérielle afin de trouver une formation qui correspond à vos besoins, et par la suite, formuler une demande lors du CREP', 0),
(361, '2021-03-18 22:37:31', 'Vous pouvez y acceder directement en cliquant sur ce lien https://offre-formation-intradef.gouv.fr', 0),
(362, '2021-03-18 22:37:31', 'Pour me réorienter professionnellement', 0),
(363, '2021-03-18 22:37:31', 'Si vous souhaitez une formation de courte ou moyenne durée, vous avez la possibilité de mobiliser vos droits CPF', 0),
(364, '2021-03-18 22:37:31', 'Si vous souhaitez une formation de longue durée, vous avez la possibilité de faire une demande de congé de formation professionnelle', 0),
(365, '2021-03-18 22:37:31', 'Faire évoluer ma situation professionnelle actuelle', 0),
(366, '2021-03-18 22:37:31', 'Sélectionner parmi ces choix votre souhait d évolution', 0),
(367, '2021-03-18 22:37:31', 'Changer de métier', 0),
(368, '2021-03-18 22:37:31', 'Si vous souhaitez une formation de courte ou moyenne durée, vous avez la possibilité de mobiliser vos droits CPF', 0),
(369, '2021-03-18 22:37:31', 'Si vous souhaitez une formation de longue durée, vous avez la possibilité de formuler une demande de congé de formation professionnelle, ou d avoir recours à la période de professionnalisation', 0),
(370, '2021-03-18 22:37:31', 'Changer de grade ou de corps', 0),
(371, '2021-03-18 22:37:31', 'Concours interne', 0),
(372, '2021-03-18 22:37:31', 'Examen professionnel', 0),
(373, '2021-03-18 22:37:31', 'Faire le point sur ma carrière', 0),
(374, '2021-03-18 22:37:31', 'Sélectionnez parmi ces choix de quelle manière souhaitez vous faire le point', 0),
(375, '2021-03-18 22:37:31', 'En rencontrant un conseiller mobilité carrière', 0),
(376, '2021-03-18 22:37:31', 'Vous pouvez trouver votre conseiller mobilité carrière en cliquant directement sur ce lien https://www.defense-mobilité.fr/', 0),
(377, '2021-03-18 22:37:31', 'En effectuant un bilan de compétences', 0),
(378, '2021-03-18 22:37:31', 'Vous pouvez formuler une demande lors du CREP ou de l', 0),
(379, '2021-03-18 22:37:31', 'Il est conseillé de prendre attache avec un CMC au préalable', 0),
(380, '2021-03-18 22:37:31', 'Faire reconnaitre mes connaissances', 0),
(381, '2021-03-18 22:37:31', 'Sélectionnez parmi ces choix ce qui vous correspond le plus', 0),
(382, '2021-03-18 22:37:31', 'Je veux obtenir mon diplôme sanctionnant des compétences dont je dispose déjà', 0),
(383, '2021-03-18 22:37:31', 'Vous pouvez effectuer une demande de validation des acquis de de l\'expérience auprès de votre responsable de formation', 0),
(384, '2021-03-18 22:37:31', 'Bilan de compétences ou bilan de compétences et renvoi MTD', 0),
(385, '2021-03-18 22:37:31', 'Site', 0);

-- --------------------------------------------------------

--
-- Structure de la table `answer_link`
--

CREATE TABLE `answer_link` (
  `id` int(11) NOT NULL,
  `source_answer_id` int(11) NOT NULL,
  `target_answer_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `answer_link`
--

INSERT INTO `answer_link` (`id`, `source_answer_id`, `target_answer_id`) VALUES
(302, 356, 357),
(303, 357, 358),
(304, 358, 359),
(305, 359, 360),
(306, 359, 361),
(307, 358, 362),
(308, 362, 363),
(309, 362, 364),
(310, 356, 365),
(311, 365, 366),
(312, 366, 367),
(313, 367, 368),
(314, 367, 369),
(315, 366, 370),
(316, 370, 371),
(317, 370, 372),
(318, 356, 373),
(319, 373, 374),
(320, 374, 375),
(321, 375, 376),
(322, 374, 377),
(323, 377, 378),
(324, 377, 379),
(325, 356, 380),
(326, 380, 381),
(327, 381, 382),
(328, 382, 383),
(329, 381, 384),
(330, 384, 385);

-- --------------------------------------------------------

--
-- Structure de la table `article`
--

CREATE TABLE `article` (
  `id` int(11) NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `content` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` datetime NOT NULL,
  `modify_at` datetime DEFAULT NULL,
  `author` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `online` tinyint(1) NOT NULL,
  `miniature_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `couverture_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `category_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `article`
--

INSERT INTO `article` (`id`, `title`, `content`, `created_at`, `modify_at`, `author`, `online`, `miniature_name`, `couverture_name`, `slug`, `category_id`) VALUES
(3, 'Salut à tous', '<p>Les agents titulaires, civils contractuels et ouvriers de l\'État qui souhaitent compléter leur formation en vue de satisfaire des projets professionnels ou personnels peuvent bénéficier d\'un congé de formation professionnelle (CFP). Il permet aux agents de parfaire leur formation par le biais de stages de formation à caractère professionnel ou personnel qui ne leur sont pas proposés par l\'administration ou par des actions organisées par l\'administration en vue de la préparation aux concours administratifs. La durée du CFP ne peut excéder trois années pour l\'ensemble de la carrière ; il peut être fractionné.</p><p>Durant le congé de formation professionnelle, le fonctionnaire perçoit, pendant une durée limitée à douze mois, une indemnité mensuelle forfaitaire égale à 85 % du traitement brut et de l\'indemnité de résidence afférents à l\'indice qu\'il détenait au moment de sa mise en congé. L\'agent qui bénéficie d\'un congé de formation s\'engage à rester au service de &nbsp;l\'administration pendant une durée égale au triple de celle pendant laquelle il a perçu l\'indemnité.</p><p>Les conditions pour y prétendre sont les suivantes :<br>&nbsp;</p><ul><li>les agents titulaires doivent avoir accompli au moins l\'équivalent de trois années à temps plein de services effectifs dans l\'administration,</li><li>les agents civils contractuels doivent justifier de l\'équivalent de trente-six mois au moins de services effectifs à temps plein au titre de contrats de droit public, dont douze mois au moins dans l\'administration à laquelle est demandé le congé de formation,</li><li>les ouvriers de l\'État doivent compter l\'équivalent de trois années au moins de services effectifs à temps plein en cette qualité.<br>L\'administration accorde la demande, dans la limite des crédits disponibles.</li></ul><p><strong>Comment effectuer sa demande ?</strong></p><p>La demande de congé de formation professionnelle doit être transmise par la voie hiérarchique au moins cent-vingt jours avant la date de début de la formation qui justifie ce congé.</p><p>La demande doit porter mention de cette date et préciser la nature de l\'action de formation, sa durée, et le nom de l\'organisme qui la dispense. L\'administration dispose alors de trente jours pour faire connaitre sa décision d\'agrément ou de rejet à l\'agent demandeur. Si un refus est opposé à la demande pour des motifs liés à des nécessités de service, la décision est alors soumise à l\'avis de la commission administrative paritaire.</p><p>L\'agent en formation au titre du congé de formation professionnelle est soumis à une obligation d\'assiduité. II doit, à la fin de chaque mois et au moment de la reprise du travail, fournir une attestation de présence en formation. Dans le cas des formations par correspondance, l\'assiduité est matérialisée par les relevés de notes de l\'agent ; toute absence sans motif valable entrainant la fin du congé et l\'obligation pour l\'agent de rembourser les indemnités perçues.<br>&nbsp;</p>', '2021-03-19 01:03:36', '2021-03-19 01:03:36', 'Jean Baptiste', 1, '6053f86855be4626495420.png', '6053f868540f5710963527.png', 'salut-a-tous-1', 1),
(5, 'Salut à tous', '<p>Les agents titulaires, civils contractuels et ouvriers de l\'État qui souhaitent compléter leur formation en vue de satisfaire des projets professionnels ou personnels peuvent bénéficier d\'un congé de formation professionnelle (CFP). Il permet aux agents de parfaire leur formation par le biais de stages de formation à caractère professionnel ou personnel qui ne leur sont pas proposés par l\'administration ou par des actions organisées par l\'administration en vue de la préparation aux concours administratifs. La durée du CFP ne peut excéder trois années pour l\'ensemble de la carrière ; il peut être fractionné.</p><p>Durant le congé de formation professionnelle, le fonctionnaire perçoit, pendant une durée limitée à douze mois, une indemnité mensuelle forfaitaire égale à 85 % du traitement brut et de l\'indemnité de résidence afférents à l\'indice qu\'il détenait au moment de sa mise en congé. L\'agent qui bénéficie d\'un congé de formation s\'engage à rester au service de &nbsp;l\'administration pendant une durée égale au triple de celle pendant laquelle il a perçu l\'indemnité.</p><p>Les conditions pour y prétendre sont les suivantes :<br>&nbsp;</p><ul><li>les agents titulaires doivent avoir accompli au moins l\'équivalent de trois années à temps plein de services effectifs dans l\'administration,</li><li>les agents civils contractuels doivent justifier de l\'équivalent de trente-six mois au moins de services effectifs à temps plein au titre de contrats de droit public, dont douze mois au moins dans l\'administration à laquelle est demandé le congé de formation,</li><li>les ouvriers de l\'État doivent compter l\'équivalent de trois années au moins de services effectifs à temps plein en cette qualité.<br>L\'administration accorde la demande, dans la limite des crédits disponibles.</li></ul><p><strong>Comment effectuer sa demande ?</strong></p><p>La demande de congé de formation professionnelle doit être transmise par la voie hiérarchique au moins cent-vingt jours avant la date de début de la formation qui justifie ce congé.</p><p>La demande doit porter mention de cette date et préciser la nature de l\'action de formation, sa durée, et le nom de l\'organisme qui la dispense. L\'administration dispose alors de trente jours pour faire connaitre sa décision d\'agrément ou de rejet à l\'agent demandeur. Si un refus est opposé à la demande pour des motifs liés à des nécessités de service, la décision est alors soumise à l\'avis de la commission administrative paritaire.</p><p>L\'agent en formation au titre du congé de formation professionnelle est soumis à une obligation d\'assiduité. II doit, à la fin de chaque mois et au moment de la reprise du travail, fournir une attestation de présence en formation. Dans le cas des formations par correspondance, l\'assiduité est matérialisée par les relevés de notes de l\'agent ; toute absence sans motif valable entrainant la fin du congé et l\'obligation pour l\'agent de rembourser les indemnités perçues.<br>&nbsp;</p>', '2021-03-19 01:03:36', '2021-03-19 01:03:36', 'Jean Baptiste', 1, '6053f86855be4626495420.png', '6053f868540f5710963527.png', 'salut-a-tous-2', 1),
(6, 'Salut à tous', '<p>Les agents titulaires, civils contractuels et ouvriers de l\'État qui souhaitent compléter leur formation en vue de satisfaire des projets professionnels ou personnels peuvent bénéficier d\'un congé de formation professionnelle (CFP). Il permet aux agents de parfaire leur formation par le biais de stages de formation à caractère professionnel ou personnel qui ne leur sont pas proposés par l\'administration ou par des actions organisées par l\'administration en vue de la préparation aux concours administratifs. La durée du CFP ne peut excéder trois années pour l\'ensemble de la carrière ; il peut être fractionné.</p><p>Durant le congé de formation professionnelle, le fonctionnaire perçoit, pendant une durée limitée à douze mois, une indemnité mensuelle forfaitaire égale à 85 % du traitement brut et de l\'indemnité de résidence afférents à l\'indice qu\'il détenait au moment de sa mise en congé. L\'agent qui bénéficie d\'un congé de formation s\'engage à rester au service de &nbsp;l\'administration pendant une durée égale au triple de celle pendant laquelle il a perçu l\'indemnité.</p><p>Les conditions pour y prétendre sont les suivantes :<br>&nbsp;</p><ul><li>les agents titulaires doivent avoir accompli au moins l\'équivalent de trois années à temps plein de services effectifs dans l\'administration,</li><li>les agents civils contractuels doivent justifier de l\'équivalent de trente-six mois au moins de services effectifs à temps plein au titre de contrats de droit public, dont douze mois au moins dans l\'administration à laquelle est demandé le congé de formation,</li><li>les ouvriers de l\'État doivent compter l\'équivalent de trois années au moins de services effectifs à temps plein en cette qualité.<br>L\'administration accorde la demande, dans la limite des crédits disponibles.</li></ul><p><strong>Comment effectuer sa demande ?</strong></p><p>La demande de congé de formation professionnelle doit être transmise par la voie hiérarchique au moins cent-vingt jours avant la date de début de la formation qui justifie ce congé.</p><p>La demande doit porter mention de cette date et préciser la nature de l\'action de formation, sa durée, et le nom de l\'organisme qui la dispense. L\'administration dispose alors de trente jours pour faire connaitre sa décision d\'agrément ou de rejet à l\'agent demandeur. Si un refus est opposé à la demande pour des motifs liés à des nécessités de service, la décision est alors soumise à l\'avis de la commission administrative paritaire.</p><p>L\'agent en formation au titre du congé de formation professionnelle est soumis à une obligation d\'assiduité. II doit, à la fin de chaque mois et au moment de la reprise du travail, fournir une attestation de présence en formation. Dans le cas des formations par correspondance, l\'assiduité est matérialisée par les relevés de notes de l\'agent ; toute absence sans motif valable entrainant la fin du congé et l\'obligation pour l\'agent de rembourser les indemnités perçues.<br>&nbsp;</p>', '2021-03-19 01:03:36', '2021-03-19 01:03:36', 'Jean Baptiste', 1, '6053f86855be4626495420.png', '6053f868540f5710963527.png', 'salut-a-tous-3', 1),
(7, 'Rencontres RH : la crise due au Covid-19 aura-t-elle été source d’innovations ?', '<p>Les agents titulaires, civils contractuels et ouvriers de l\'État qui souhaitent compléter leur formation en vue de satisfaire des projets professionnels ou personnels peuvent bénéficier d\'un congé de formation professionnelle (CFP). Il permet aux agents de parfaire leur formation par le biais de stages de formation à caractère professionnel ou personnel qui ne leur sont pas proposés par l\'administration ou par des actions organisées par l\'administration en vue de la préparation aux concours administratifs. La durée du CFP ne peut excéder trois années pour l\'ensemble de la carrière ; il peut être fractionné.</p><p>Durant le congé de formation professionnelle, le fonctionnaire perçoit, pendant une durée limitée à douze mois, une indemnité mensuelle forfaitaire égale à 85 % du traitement brut et de l\'indemnité de résidence afférents à l\'indice qu\'il détenait au moment de sa mise en congé. L\'agent qui bénéficie d\'un congé de formation s\'engage à rester au service de &nbsp;l\'administration pendant une durée égale au triple de celle pendant laquelle il a perçu l\'indemnité.</p><p>Les conditions pour y prétendre sont les suivantes :<br>&nbsp;</p><ul><li>les agents titulaires doivent avoir accompli au moins l\'équivalent de trois années à temps plein de services effectifs dans l\'administration,</li><li>les agents civils contractuels doivent justifier de l\'équivalent de trente-six mois au moins de services effectifs à temps plein au titre de contrats de droit public, dont douze mois au moins dans l\'administration à laquelle est demandé le congé de formation,</li><li>les ouvriers de l\'État doivent compter l\'équivalent de trois années au moins de services effectifs à temps plein en cette qualité.<br>L\'administration accorde la demande, dans la limite des crédits disponibles.</li></ul><p><strong>Comment effectuer sa demande ?</strong></p><p>La demande de congé de formation professionnelle doit être transmise par la voie hiérarchique au moins cent-vingt jours avant la date de début de la formation qui justifie ce congé.</p><p>La demande doit porter mention de cette date et préciser la nature de l\'action de formation, sa durée, et le nom de l\'organisme qui la dispense. L\'administration dispose alors de trente jours pour faire connaitre sa décision d\'agrément ou de rejet à l\'agent demandeur. Si un refus est opposé à la demande pour des motifs liés à des nécessités de service, la décision est alors soumise à l\'avis de la commission administrative paritaire.</p><p>L\'agent en formation au titre du congé de formation professionnelle est soumis à une obligation d\'assiduité. II doit, à la fin de chaque mois et au moment de la reprise du travail, fournir une attestation de présence en formation. Dans le cas des formations par correspondance, l\'assiduité est matérialisée par les relevés de notes de l\'agent ; toute absence sans motif valable entrainant la fin du congé et l\'obligation pour l\'agent de rembourser les indemnités perçues.<br>&nbsp;</p>', '2021-03-19 01:03:36', '2021-03-19 10:43:50', 'Jean Baptiste', 1, '6053f86855be4626495420.png', '6053f868540f5710963527.png', 'rencontres-rh-la-crise-due-au-covid-19-aura-t-elle-ete-source-dinnovations', 1),
(8, 'Salut à tous', '<p>Les agents titulaires, civils contractuels et ouvriers de l\'État qui souhaitent compléter leur formation en vue de satisfaire des projets professionnels ou personnels peuvent bénéficier d\'un congé de formation professionnelle (CFP). Il permet aux agents de parfaire leur formation par le biais de stages de formation à caractère professionnel ou personnel qui ne leur sont pas proposés par l\'administration ou par des actions organisées par l\'administration en vue de la préparation aux concours administratifs. La durée du CFP ne peut excéder trois années pour l\'ensemble de la carrière ; il peut être fractionné.</p><p>Durant le congé de formation professionnelle, le fonctionnaire perçoit, pendant une durée limitée à douze mois, une indemnité mensuelle forfaitaire égale à 85 % du traitement brut et de l\'indemnité de résidence afférents à l\'indice qu\'il détenait au moment de sa mise en congé. L\'agent qui bénéficie d\'un congé de formation s\'engage à rester au service de &nbsp;l\'administration pendant une durée égale au triple de celle pendant laquelle il a perçu l\'indemnité.</p><p>Les conditions pour y prétendre sont les suivantes :<br>&nbsp;</p><ul><li>les agents titulaires doivent avoir accompli au moins l\'équivalent de trois années à temps plein de services effectifs dans l\'administration,</li><li>les agents civils contractuels doivent justifier de l\'équivalent de trente-six mois au moins de services effectifs à temps plein au titre de contrats de droit public, dont douze mois au moins dans l\'administration à laquelle est demandé le congé de formation,</li><li>les ouvriers de l\'État doivent compter l\'équivalent de trois années au moins de services effectifs à temps plein en cette qualité.<br>L\'administration accorde la demande, dans la limite des crédits disponibles.</li></ul><p><strong>Comment effectuer sa demande ?</strong></p><p>La demande de congé de formation professionnelle doit être transmise par la voie hiérarchique au moins cent-vingt jours avant la date de début de la formation qui justifie ce congé.</p><p>La demande doit porter mention de cette date et préciser la nature de l\'action de formation, sa durée, et le nom de l\'organisme qui la dispense. L\'administration dispose alors de trente jours pour faire connaitre sa décision d\'agrément ou de rejet à l\'agent demandeur. Si un refus est opposé à la demande pour des motifs liés à des nécessités de service, la décision est alors soumise à l\'avis de la commission administrative paritaire.</p><p>L\'agent en formation au titre du congé de formation professionnelle est soumis à une obligation d\'assiduité. II doit, à la fin de chaque mois et au moment de la reprise du travail, fournir une attestation de présence en formation. Dans le cas des formations par correspondance, l\'assiduité est matérialisée par les relevés de notes de l\'agent ; toute absence sans motif valable entrainant la fin du congé et l\'obligation pour l\'agent de rembourser les indemnités perçues.<br>&nbsp;</p>', '2021-03-19 01:03:36', '2021-03-19 01:03:36', 'Jean Baptiste', 1, '6053f86855be4626495420.png', '6053f868540f5710963527.png', 'salut-a-tous-5\r\n', 1),
(9, 'Salut à tous', '<p>Les agents titulaires, civils contractuels et ouvriers de l\'État qui souhaitent compléter leur formation en vue de satisfaire des projets professionnels ou personnels peuvent bénéficier d\'un congé de formation professionnelle (CFP). Il permet aux agents de parfaire leur formation par le biais de stages de formation à caractère professionnel ou personnel qui ne leur sont pas proposés par l\'administration ou par des actions organisées par l\'administration en vue de la préparation aux concours administratifs. La durée du CFP ne peut excéder trois années pour l\'ensemble de la carrière ; il peut être fractionné.</p><p>Durant le congé de formation professionnelle, le fonctionnaire perçoit, pendant une durée limitée à douze mois, une indemnité mensuelle forfaitaire égale à 85 % du traitement brut et de l\'indemnité de résidence afférents à l\'indice qu\'il détenait au moment de sa mise en congé. L\'agent qui bénéficie d\'un congé de formation s\'engage à rester au service de &nbsp;l\'administration pendant une durée égale au triple de celle pendant laquelle il a perçu l\'indemnité.</p><p>Les conditions pour y prétendre sont les suivantes :<br>&nbsp;</p><ul><li>les agents titulaires doivent avoir accompli au moins l\'équivalent de trois années à temps plein de services effectifs dans l\'administration,</li><li>les agents civils contractuels doivent justifier de l\'équivalent de trente-six mois au moins de services effectifs à temps plein au titre de contrats de droit public, dont douze mois au moins dans l\'administration à laquelle est demandé le congé de formation,</li><li>les ouvriers de l\'État doivent compter l\'équivalent de trois années au moins de services effectifs à temps plein en cette qualité.<br>L\'administration accorde la demande, dans la limite des crédits disponibles.</li></ul><p><strong>Comment effectuer sa demande ?</strong></p><p>La demande de congé de formation professionnelle doit être transmise par la voie hiérarchique au moins cent-vingt jours avant la date de début de la formation qui justifie ce congé.</p><p>La demande doit porter mention de cette date et préciser la nature de l\'action de formation, sa durée, et le nom de l\'organisme qui la dispense. L\'administration dispose alors de trente jours pour faire connaitre sa décision d\'agrément ou de rejet à l\'agent demandeur. Si un refus est opposé à la demande pour des motifs liés à des nécessités de service, la décision est alors soumise à l\'avis de la commission administrative paritaire.</p><p>L\'agent en formation au titre du congé de formation professionnelle est soumis à une obligation d\'assiduité. II doit, à la fin de chaque mois et au moment de la reprise du travail, fournir une attestation de présence en formation. Dans le cas des formations par correspondance, l\'assiduité est matérialisée par les relevés de notes de l\'agent ; toute absence sans motif valable entrainant la fin du congé et l\'obligation pour l\'agent de rembourser les indemnités perçues.<br>&nbsp;</p>', '2021-03-19 01:03:36', '2021-03-19 01:03:36', 'Jean Baptiste', 1, '6053f86855be4626495420.png', '6053f868540f5710963527.png', 'salut-a-tous-7', 1),
(10, 'Salut à tous', '<p>Les agents titulaires, civils contractuels et ouvriers de l\'État qui souhaitent compléter leur formation en vue de satisfaire des projets professionnels ou personnels peuvent bénéficier d\'un congé de formation professionnelle (CFP). Il permet aux agents de parfaire leur formation par le biais de stages de formation à caractère professionnel ou personnel qui ne leur sont pas proposés par l\'administration ou par des actions organisées par l\'administration en vue de la préparation aux concours administratifs. La durée du CFP ne peut excéder trois années pour l\'ensemble de la carrière ; il peut être fractionné.</p><p>Durant le congé de formation professionnelle, le fonctionnaire perçoit, pendant une durée limitée à douze mois, une indemnité mensuelle forfaitaire égale à 85 % du traitement brut et de l\'indemnité de résidence afférents à l\'indice qu\'il détenait au moment de sa mise en congé. L\'agent qui bénéficie d\'un congé de formation s\'engage à rester au service de &nbsp;l\'administration pendant une durée égale au triple de celle pendant laquelle il a perçu l\'indemnité.</p><p>Les conditions pour y prétendre sont les suivantes :<br>&nbsp;</p><ul><li>les agents titulaires doivent avoir accompli au moins l\'équivalent de trois années à temps plein de services effectifs dans l\'administration,</li><li>les agents civils contractuels doivent justifier de l\'équivalent de trente-six mois au moins de services effectifs à temps plein au titre de contrats de droit public, dont douze mois au moins dans l\'administration à laquelle est demandé le congé de formation,</li><li>les ouvriers de l\'État doivent compter l\'équivalent de trois années au moins de services effectifs à temps plein en cette qualité.<br>L\'administration accorde la demande, dans la limite des crédits disponibles.</li></ul><p><strong>Comment effectuer sa demande ?</strong></p><p>La demande de congé de formation professionnelle doit être transmise par la voie hiérarchique au moins cent-vingt jours avant la date de début de la formation qui justifie ce congé.</p><p>La demande doit porter mention de cette date et préciser la nature de l\'action de formation, sa durée, et le nom de l\'organisme qui la dispense. L\'administration dispose alors de trente jours pour faire connaitre sa décision d\'agrément ou de rejet à l\'agent demandeur. Si un refus est opposé à la demande pour des motifs liés à des nécessités de service, la décision est alors soumise à l\'avis de la commission administrative paritaire.</p><p>L\'agent en formation au titre du congé de formation professionnelle est soumis à une obligation d\'assiduité. II doit, à la fin de chaque mois et au moment de la reprise du travail, fournir une attestation de présence en formation. Dans le cas des formations par correspondance, l\'assiduité est matérialisée par les relevés de notes de l\'agent ; toute absence sans motif valable entrainant la fin du congé et l\'obligation pour l\'agent de rembourser les indemnités perçues.<br>&nbsp;</p>', '2021-03-19 01:03:36', '2021-03-19 01:03:36', 'Jean Baptiste', 1, '6053f86855be4626495420.png', '6053f868540f5710963527.png', 'salut-a-tous-6', 1),
(11, 'Salut à tous', '<p>Les agents titulaires, civils contractuels et ouvriers de l\'État qui souhaitent compléter leur formation en vue de satisfaire des projets professionnels ou personnels peuvent bénéficier d\'un congé de formation professionnelle (CFP). Il permet aux agents de parfaire leur formation par le biais de stages de formation à caractère professionnel ou personnel qui ne leur sont pas proposés par l\'administration ou par des actions organisées par l\'administration en vue de la préparation aux concours administratifs. La durée du CFP ne peut excéder trois années pour l\'ensemble de la carrière ; il peut être fractionné.</p><p>Durant le congé de formation professionnelle, le fonctionnaire perçoit, pendant une durée limitée à douze mois, une indemnité mensuelle forfaitaire égale à 85 % du traitement brut et de l\'indemnité de résidence afférents à l\'indice qu\'il détenait au moment de sa mise en congé. L\'agent qui bénéficie d\'un congé de formation s\'engage à rester au service de &nbsp;l\'administration pendant une durée égale au triple de celle pendant laquelle il a perçu l\'indemnité.</p><p>Les conditions pour y prétendre sont les suivantes :<br>&nbsp;</p><ul><li>les agents titulaires doivent avoir accompli au moins l\'équivalent de trois années à temps plein de services effectifs dans l\'administration,</li><li>les agents civils contractuels doivent justifier de l\'équivalent de trente-six mois au moins de services effectifs à temps plein au titre de contrats de droit public, dont douze mois au moins dans l\'administration à laquelle est demandé le congé de formation,</li><li>les ouvriers de l\'État doivent compter l\'équivalent de trois années au moins de services effectifs à temps plein en cette qualité.<br>L\'administration accorde la demande, dans la limite des crédits disponibles.</li></ul><p><strong>Comment effectuer sa demande ?</strong></p><p>La demande de congé de formation professionnelle doit être transmise par la voie hiérarchique au moins cent-vingt jours avant la date de début de la formation qui justifie ce congé.</p><p>La demande doit porter mention de cette date et préciser la nature de l\'action de formation, sa durée, et le nom de l\'organisme qui la dispense. L\'administration dispose alors de trente jours pour faire connaitre sa décision d\'agrément ou de rejet à l\'agent demandeur. Si un refus est opposé à la demande pour des motifs liés à des nécessités de service, la décision est alors soumise à l\'avis de la commission administrative paritaire.</p><p>L\'agent en formation au titre du congé de formation professionnelle est soumis à une obligation d\'assiduité. II doit, à la fin de chaque mois et au moment de la reprise du travail, fournir une attestation de présence en formation. Dans le cas des formations par correspondance, l\'assiduité est matérialisée par les relevés de notes de l\'agent ; toute absence sans motif valable entrainant la fin du congé et l\'obligation pour l\'agent de rembourser les indemnités perçues.<br>&nbsp;</p>', '2021-03-19 01:03:36', '2021-03-19 01:03:36', 'Jean Baptiste', 1, '6053f86855be4626495420.png', '6053f868540f5710963527.png', 'salut-a-tous-8', 1),
(12, 'Salut à tous', '<p>Les agents titulaires, civils contractuels et ouvriers de l\'État qui souhaitent compléter leur formation en vue de satisfaire des projets professionnels ou personnels peuvent bénéficier d\'un congé de formation professionnelle (CFP). Il permet aux agents de parfaire leur formation par le biais de stages de formation à caractère professionnel ou personnel qui ne leur sont pas proposés par l\'administration ou par des actions organisées par l\'administration en vue de la préparation aux concours administratifs. La durée du CFP ne peut excéder trois années pour l\'ensemble de la carrière ; il peut être fractionné.</p><p>Durant le congé de formation professionnelle, le fonctionnaire perçoit, pendant une durée limitée à douze mois, une indemnité mensuelle forfaitaire égale à 85 % du traitement brut et de l\'indemnité de résidence afférents à l\'indice qu\'il détenait au moment de sa mise en congé. L\'agent qui bénéficie d\'un congé de formation s\'engage à rester au service de &nbsp;l\'administration pendant une durée égale au triple de celle pendant laquelle il a perçu l\'indemnité.</p><p>Les conditions pour y prétendre sont les suivantes :<br>&nbsp;</p><ul><li>les agents titulaires doivent avoir accompli au moins l\'équivalent de trois années à temps plein de services effectifs dans l\'administration,</li><li>les agents civils contractuels doivent justifier de l\'équivalent de trente-six mois au moins de services effectifs à temps plein au titre de contrats de droit public, dont douze mois au moins dans l\'administration à laquelle est demandé le congé de formation,</li><li>les ouvriers de l\'État doivent compter l\'équivalent de trois années au moins de services effectifs à temps plein en cette qualité.<br>L\'administration accorde la demande, dans la limite des crédits disponibles.</li></ul><p><strong>Comment effectuer sa demande ?</strong></p><p>La demande de congé de formation professionnelle doit être transmise par la voie hiérarchique au moins cent-vingt jours avant la date de début de la formation qui justifie ce congé.</p><p>La demande doit porter mention de cette date et préciser la nature de l\'action de formation, sa durée, et le nom de l\'organisme qui la dispense. L\'administration dispose alors de trente jours pour faire connaitre sa décision d\'agrément ou de rejet à l\'agent demandeur. Si un refus est opposé à la demande pour des motifs liés à des nécessités de service, la décision est alors soumise à l\'avis de la commission administrative paritaire.</p><p>L\'agent en formation au titre du congé de formation professionnelle est soumis à une obligation d\'assiduité. II doit, à la fin de chaque mois et au moment de la reprise du travail, fournir une attestation de présence en formation. Dans le cas des formations par correspondance, l\'assiduité est matérialisée par les relevés de notes de l\'agent ; toute absence sans motif valable entrainant la fin du congé et l\'obligation pour l\'agent de rembourser les indemnités perçues.<br>&nbsp;</p>', '2021-03-19 01:03:36', '2021-03-19 01:03:36', 'Jean Baptiste', 1, '6053f86855be4626495420.png', '6053f868540f5710963527.png', 'salut-a-tous-9', 1),
(13, 'Salut à tous', '<p>Les agents titulaires, civils contractuels et ouvriers de l\'État qui souhaitent compléter leur formation en vue de satisfaire des projets professionnels ou personnels peuvent bénéficier d\'un congé de formation professionnelle (CFP). Il permet aux agents de parfaire leur formation par le biais de stages de formation à caractère professionnel ou personnel qui ne leur sont pas proposés par l\'administration ou par des actions organisées par l\'administration en vue de la préparation aux concours administratifs. La durée du CFP ne peut excéder trois années pour l\'ensemble de la carrière ; il peut être fractionné.</p><p>Durant le congé de formation professionnelle, le fonctionnaire perçoit, pendant une durée limitée à douze mois, une indemnité mensuelle forfaitaire égale à 85 % du traitement brut et de l\'indemnité de résidence afférents à l\'indice qu\'il détenait au moment de sa mise en congé. L\'agent qui bénéficie d\'un congé de formation s\'engage à rester au service de &nbsp;l\'administration pendant une durée égale au triple de celle pendant laquelle il a perçu l\'indemnité.</p><p>Les conditions pour y prétendre sont les suivantes :<br>&nbsp;</p><ul><li>les agents titulaires doivent avoir accompli au moins l\'équivalent de trois années à temps plein de services effectifs dans l\'administration,</li><li>les agents civils contractuels doivent justifier de l\'équivalent de trente-six mois au moins de services effectifs à temps plein au titre de contrats de droit public, dont douze mois au moins dans l\'administration à laquelle est demandé le congé de formation,</li><li>les ouvriers de l\'État doivent compter l\'équivalent de trois années au moins de services effectifs à temps plein en cette qualité.<br>L\'administration accorde la demande, dans la limite des crédits disponibles.</li></ul><p><strong>Comment effectuer sa demande ?</strong></p><p>La demande de congé de formation professionnelle doit être transmise par la voie hiérarchique au moins cent-vingt jours avant la date de début de la formation qui justifie ce congé.</p><p>La demande doit porter mention de cette date et préciser la nature de l\'action de formation, sa durée, et le nom de l\'organisme qui la dispense. L\'administration dispose alors de trente jours pour faire connaitre sa décision d\'agrément ou de rejet à l\'agent demandeur. Si un refus est opposé à la demande pour des motifs liés à des nécessités de service, la décision est alors soumise à l\'avis de la commission administrative paritaire.</p><p>L\'agent en formation au titre du congé de formation professionnelle est soumis à une obligation d\'assiduité. II doit, à la fin de chaque mois et au moment de la reprise du travail, fournir une attestation de présence en formation. Dans le cas des formations par correspondance, l\'assiduité est matérialisée par les relevés de notes de l\'agent ; toute absence sans motif valable entrainant la fin du congé et l\'obligation pour l\'agent de rembourser les indemnités perçues.<br>&nbsp;</p>', '2021-03-19 01:03:36', '2021-03-19 02:18:54', 'Jean Baptiste', 1, '6053f86855be4626495420.png', '6053f868540f5710963527.png', 'salut-a-tous-10', 2);

-- --------------------------------------------------------

--
-- Structure de la table `category`
--

CREATE TABLE `category` (
  `id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(128) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `category`
--

INSERT INTO `category` (`id`, `name`, `slug`, `created_at`, `updated_at`) VALUES
(1, 'Urgent2', 'urgent2', '2021-03-19 02:15:42', '2021-03-19 02:19:09'),
(2, 'News', 'news', '2021-03-19 02:18:49', NULL);

-- --------------------------------------------------------

--
-- Structure de la table `doctrine_migration_versions`
--

CREATE TABLE `doctrine_migration_versions` (
  `version` varchar(191) COLLATE utf8_unicode_ci NOT NULL,
  `executed_at` datetime DEFAULT NULL,
  `execution_time` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Déchargement des données de la table `doctrine_migration_versions`
--

INSERT INTO `doctrine_migration_versions` (`version`, `executed_at`, `execution_time`) VALUES
('DoctrineMigrations\\Version20210316163707', '2021-03-16 16:37:11', 145),
('DoctrineMigrations\\Version20210317101129', '2021-03-17 10:11:34', 399),
('DoctrineMigrations\\Version20210317101445', '2021-03-17 10:14:49', 496),
('DoctrineMigrations\\Version20210319001002', '2021-03-19 00:10:05', 419),
('DoctrineMigrations\\Version20210319003232', '2021-03-19 00:32:35', 107),
('DoctrineMigrations\\Version20210319003940', '2021-03-19 00:39:46', 146),
('DoctrineMigrations\\Version20210319021527', '2021-03-19 02:15:32', 356);

-- --------------------------------------------------------

--
-- Structure de la table `images`
--

CREATE TABLE `images` (
  `id` int(11) NOT NULL,
  `route` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `images_pages`
--

CREATE TABLE `images_pages` (
  `images_id` int(11) NOT NULL,
  `pages_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `pages`
--

CREATE TABLE `pages` (
  `id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `title` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `content` longtext COLLATE utf8mb4_unicode_ci,
  `type` varchar(25) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `username` varchar(180) COLLATE utf8mb4_unicode_ci NOT NULL,
  `roles` json NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime DEFAULT NULL,
  `delete_at` datetime DEFAULT NULL,
  `active` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `user`
--

INSERT INTO `user` (`id`, `username`, `roles`, `password`, `created_at`, `updated_at`, `delete_at`, `active`) VALUES
(1, 'admin', '[\"ROLE_SUPER_ADMIN\"]', '$argon2id$v=19$m=65536,t=4,p=1$hx4D9VdVvH7t5J1skUMETQ$B8XT17eBayO7+r4pIaYGDCCq0YWXEZU1jX2HvM7PyMw', '2021-01-06 00:55:27', NULL, NULL, 1);

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `annuaire`
--
ALTER TABLE `annuaire`
    ADD PRIMARY KEY (`id`),
  ADD KEY `IDX_456BA70B98260155` (`region_id`);

--
-- Index pour la table `annuaire_regions`
--
ALTER TABLE `annuaire_regions`
    ADD PRIMARY KEY (`id`);

--
-- Index pour la table `answer`
--
ALTER TABLE `answer`
    ADD PRIMARY KEY (`id`);

--
-- Index pour la table `answer_link`
--
ALTER TABLE `answer_link`
    ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `UNIQ_68877A319E873A2B` (`target_answer_id`),
  ADD KEY `IDX_68877A31C2ADDBC9` (`source_answer_id`);

--
-- Index pour la table `article`
--
ALTER TABLE `article`
    ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `UNIQ_23A0E66989D9B62` (`slug`),
  ADD KEY `IDX_23A0E6612469DE2` (`category_id`);

--
-- Index pour la table `category`
--
ALTER TABLE `category`
    ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `UNIQ_64C19C1989D9B62` (`slug`);

--
-- Index pour la table `doctrine_migration_versions`
--
ALTER TABLE `doctrine_migration_versions`
    ADD PRIMARY KEY (`version`);

--
-- Index pour la table `images`
--
ALTER TABLE `images`
    ADD PRIMARY KEY (`id`);

--
-- Index pour la table `images_pages`
--
ALTER TABLE `images_pages`
    ADD PRIMARY KEY (`images_id`,`pages_id`),
  ADD KEY `IDX_D4C04C9D44F05E5` (`images_id`),
  ADD KEY `IDX_D4C04C9401ADD27` (`pages_id`);

--
-- Index pour la table `pages`
--
ALTER TABLE `pages`
    ADD PRIMARY KEY (`id`);

--
-- Index pour la table `user`
--
ALTER TABLE `user`
    ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `UNIQ_8D93D649F85E0677` (`username`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `annuaire`
--
ALTER TABLE `annuaire`
    MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT pour la table `annuaire_regions`
--
ALTER TABLE `annuaire_regions`
    MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT pour la table `answer`
--
ALTER TABLE `answer`
    MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=386;

--
-- AUTO_INCREMENT pour la table `answer_link`
--
ALTER TABLE `answer_link`
    MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=331;

--
-- AUTO_INCREMENT pour la table `article`
--
ALTER TABLE `article`
    MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT pour la table `category`
--
ALTER TABLE `category`
    MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT pour la table `images`
--
ALTER TABLE `images`
    MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `pages`
--
ALTER TABLE `pages`
    MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `user`
--
ALTER TABLE `user`
    MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `annuaire`
--
ALTER TABLE `annuaire`
    ADD CONSTRAINT `FK_456BA70B98260155` FOREIGN KEY (`region_id`) REFERENCES `annuaire_regions` (`id`);

--
-- Contraintes pour la table `answer_link`
--
ALTER TABLE `answer_link`
    ADD CONSTRAINT `FK_68877A319E873A2B` FOREIGN KEY (`target_answer_id`) REFERENCES `answer` (`id`),
  ADD CONSTRAINT `FK_68877A31C2ADDBC9` FOREIGN KEY (`source_answer_id`) REFERENCES `answer` (`id`);

--
-- Contraintes pour la table `article`
--
ALTER TABLE `article`
    ADD CONSTRAINT `FK_23A0E6612469DE2` FOREIGN KEY (`category_id`) REFERENCES `category` (`id`);

--
-- Contraintes pour la table `images_pages`
--
ALTER TABLE `images_pages`
    ADD CONSTRAINT `FK_D4C04C9401ADD27` FOREIGN KEY (`pages_id`) REFERENCES `pages` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `FK_D4C04C9D44F05E5` FOREIGN KEY (`images_id`) REFERENCES `images` (`id`) ON DELETE CASCADE;
