<?php

use Illuminate\Database\Seeder;
use App\Post;
use App\User;
use Carbon\Carbon;

class PostsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Supprimer les posts existants
        Post::truncate();
        
        // Récupérer tous les utilisateurs
        $users = User::all();
        
        if ($users->isEmpty()) {
            // Si aucun utilisateur n'existe, en créer un
            $user = User::create([
                'name' => 'Admin User',
                'email' => 'admin@example.com',
                'password' => bcrypt('password')
            ]);
            $users = collect([$user]);
        }
        
        // Catégories plus réalistes
        $categories = [
            'Actualités', 'Technologie', 'Santé', 'Éducation', 
            'Sports', 'Culture', 'Politique', 'Économie', 
            'Environnement', 'Voyages', 'Cuisine', 'Mode'
        ];
        
        $statuses = ['published', 'draft'];
        
        // Contenu réaliste pour différentes catégories
        $posts = [
            // Actualités
            [
                'title' => 'Les dernières mesures économiques annoncées par le gouvernement',
                'content' => "Le gouvernement a dévoilé hier un nouveau plan de relance économique visant à soutenir les PME touchées par la crise. Ce plan, d'un montant de 15 milliards d'euros, prévoit notamment des allègements fiscaux et des aides directes aux entreprises les plus fragilisées.\n\nLors de la conférence de presse, le ministre de l'Économie a précisé que \"ces mesures visent à préserver l'emploi et à stimuler l'investissement dans les secteurs stratégiques\". Les premiers effets de ce plan devraient se faire sentir dès le trimestre prochain, selon les analystes économiques.",
                'category' => 'Actualités'
            ],
            [
                'title' => 'Inauguration du nouveau centre culturel de la ville',
                'content' => "Après trois ans de travaux, le nouveau centre culturel a été inauguré ce week-end en présence des autorités locales. Ce bâtiment de 5000m², conçu par l'architecte renommée Sophie Martin, comprend une médiathèque, un auditorium de 300 places et plusieurs salles d'exposition.\n\n\"Ce lieu sera un véritable carrefour d'échanges culturels pour tous les habitants\", a déclaré le maire lors de son discours inaugural. La programmation de la première saison, dévoilée lors de l'événement, propose plus de 50 spectacles et expositions.",
                'category' => 'Actualités'
            ],
            
            // Technologie
            [
                'title' => 'L\'intelligence artificielle révolutionne le secteur médical',
                'content' => "Une équipe de chercheurs vient de mettre au point un algorithme d'intelligence artificielle capable de détecter certaines pathologies cardiaques avec une précision supérieure à celle des médecins spécialistes. Cette avancée majeure pourrait transformer le diagnostic précoce des maladies cardiovasculaires.\n\nL'étude, publiée dans la prestigieuse revue Nature Medicine, démontre que l'IA peut analyser des électrocardiogrammes et identifier des anomalies subtiles que l'œil humain pourrait manquer. \"Nous ne cherchons pas à remplacer les médecins, mais à leur fournir un outil supplémentaire pour améliorer la précision des diagnostics\", précise le Dr. Chen, principal auteur de l'étude.",
                'category' => 'Technologie'
            ],
            [
                'title' => 'La 5G déployée dans cinq nouvelles villes',
                'content' => "L'opérateur national a annoncé hier le déploiement de la 5G dans cinq nouvelles agglomérations, portant à 25 le nombre de villes couvertes par cette technologie. Les utilisateurs pourront bénéficier de débits jusqu'à 10 fois supérieurs à la 4G.\n\nCe déploiement s'accompagne du lancement de nouvelles offres commerciales spécifiquement conçues pour tirer parti des capacités de la 5G. Les professionnels des secteurs de la santé, de l'industrie et des transports sont particulièrement ciblés par ces nouvelles offres qui promettent de transformer leurs activités grâce à une connectivité ultra-rapide et fiable.",
                'category' => 'Technologie'
            ],
            
            // Santé
            [
                'title' => 'Découverte prometteuse contre la maladie d\'Alzheimer',
                'content' => "Une équipe internationale de chercheurs a identifié un mécanisme cellulaire qui pourrait ouvrir la voie à de nouveaux traitements contre la maladie d'Alzheimer. Cette découverte, publiée dans la revue Science, concerne une protéine capable de ralentir la progression de la maladie chez les souris de laboratoire.\n\n\"Nous avons observé une réduction significative des plaques amyloïdes dans le cerveau des souris traitées\", explique la Pr. Martinez, qui dirige ces recherches depuis plus de dix ans. Les essais cliniques sur des patients humains pourraient débuter d'ici deux ans, sous réserve de l'approbation des autorités sanitaires.",
                'category' => 'Santé'
            ],
            [
                'title' => 'Les bienfaits insoupçonnés de la marche quotidienne',
                'content' => "Une nouvelle étude menée sur plus de 10 000 participants pendant cinq ans révèle que 30 minutes de marche quotidienne réduiraient de 25% le risque de maladies cardiovasculaires. Ces résultats confirment l'importance de cette activité physique accessible à tous.\n\nLe Dr. Dupont, cardiologue et co-auteur de l'étude, recommande \"d'intégrer la marche dans sa routine quotidienne, en privilégiant les escaliers aux ascenseurs ou en descendant du bus un arrêt plus tôt\". L'étude souligne également que les bénéfices sont observés même chez les personnes qui fractionnent ces 30 minutes en plusieurs sessions au cours de la journée.",
                'category' => 'Santé'
            ],
            
            // Éducation
            [
                'title' => 'Réforme du baccalauréat : premier bilan après un an',
                'content' => "Un an après la mise en place de la réforme du baccalauréat, le ministère de l'Éducation nationale dresse un premier bilan. Si le taux de réussite global reste stable, les disparités entre établissements semblent s'être accentuées selon le rapport publié hier.\n\nLes enseignants pointent notamment la charge de travail supplémentaire liée au contrôle continu et aux épreuves communes. \"Nous devons ajuster certains aspects de la réforme pour garantir l'équité entre tous les candidats\", a reconnu le ministre lors de sa conférence de presse. Une concertation avec les syndicats est prévue le mois prochain pour discuter des aménagements possibles.",
                'category' => 'Éducation'
            ],
            [
                'title' => 'Les méthodes d\'apprentissage alternatives gagnent du terrain',
                'content' => "De plus en plus d'établissements scolaires expérimentent des méthodes pédagogiques alternatives, s'inspirant des approches Montessori, Freinet ou Steiner. Ces méthodes, qui placent l'enfant au centre du processus d'apprentissage, séduisent un nombre croissant de parents.\n\nL'école Jean Jaurès a ainsi transformé complètement son approche pédagogique depuis trois ans. \"Nous observons une amélioration significative de l'engagement des élèves et de leur créativité\", témoigne sa directrice. Le ministère suit ces expérimentations avec intérêt et envisage d'intégrer certains de ces principes dans la formation initiale des enseignants.",
                'category' => 'Éducation'
            ],
            
            // Sports
            [
                'title' => 'L\'équipe nationale se qualifie pour les quarts de finale',
                'content' => "Grâce à une victoire éclatante 3-0 hier soir, notre équipe nationale s'est qualifiée pour les quarts de finale de la compétition. Une performance remarquable portée par un collectif soudé et une défense intraitable.\n\nLe sélectionneur s'est montré satisfait en conférence de presse : \"Les joueurs ont parfaitement appliqué les consignes tactiques et ont fait preuve d'une grande détermination\". Le prochain match, prévu dimanche contre les champions en titre, s'annonce comme le véritable test pour évaluer les ambitions de l'équipe dans cette compétition.",
                'category' => 'Sports'
            ],
            [
                'title' => 'Le marathon de la ville bat son record de participation',
                'content' => "Plus de 15 000 coureurs ont participé au marathon de la ville ce dimanche, un record absolu pour cette épreuve créée il y a douze ans. Le parcours, redessiné cette année pour mettre en valeur le patrimoine historique, a été unanimement salué par les participants.\n\nLe Kényan James Kipchoge s'est imposé chez les hommes en 2h08'43\", tandis que l'Éthiopienne Abebe Bikila remportait l'épreuve féminine en 2h24'12\". Au-delà de l'élite, l'événement a attiré de nombreux coureurs amateurs et a permis de collecter plus de 100 000 euros pour diverses associations caritatives.",
                'category' => 'Sports'
            ],
            
            // Culture
            [
                'title' => 'Rétrospective exceptionnelle au musée d\'art moderne',
                'content' => "Le musée d'art moderne accueille à partir de demain une rétrospective exceptionnelle consacrée à l'œuvre de Maria Gonzalez, figure majeure de l'expressionnisme abstrait. Plus de 120 tableaux, dont certains jamais exposés en Europe, seront présentés au public.\n\n\"Cette exposition permet de comprendre l'évolution artistique de Gonzalez sur cinq décennies de création\", explique le commissaire de l'exposition. Des visites guidées thématiques et des ateliers pour enfants sont proposés en parallèle de l'exposition, qui devrait attirer plus de 200 000 visiteurs selon les prévisions du musée.",
                'category' => 'Culture'
            ],
            [
                'title' => 'Le festival de cinéma indépendant fête ses 20 ans',
                'content' => "Le festival de cinéma indépendant célèbre cette année sa 20e édition avec une programmation particulièrement riche : 150 films issus de 45 pays différents seront projetés dans les cinq salles partenaires de l'événement.\n\nParmi les temps forts, la présence exceptionnelle du réalisateur Wong Kar-wai qui présidera le jury et donnera une masterclass ouverte au public. Le festival, qui a révélé de nombreux talents devenus incontournables, confirme son statut de rendez-vous majeur pour les cinéphiles et les professionnels du secteur.",
                'category' => 'Culture'
            ],
            
            // Économie
            [
                'title' => 'La banque centrale maintient ses taux directeurs',
                'content' => "Comme anticipé par la plupart des analystes, la banque centrale a décidé hier de maintenir ses taux directeurs inchangés. Cette décision s'inscrit dans une stratégie de stabilisation après les turbulences économiques des derniers mois.\n\n\"L'inflation semble désormais sous contrôle, mais nous restons vigilants quant aux tensions qui persistent sur certains marchés\", a précisé le gouverneur dans son communiqué. Les marchés financiers ont réagi positivement à cette annonce, l'indice principal gagnant 0,8% à la clôture.",
                'category' => 'Économie'
            ],
            [
                'title' => 'L\'entreprise locale s\'impose comme leader européen',
                'content' => "L'entreprise locale TechInnovation, spécialisée dans les solutions de cybersécurité, vient de finaliser l'acquisition de son concurrent allemand pour 250 millions d'euros. Cette opération la positionne comme le leader européen incontesté de son secteur.\n\n\"Cette acquisition s'inscrit parfaitement dans notre stratégie de développement international\", explique sa PDG, Marie Lefort. L'entreprise, qui employait 350 personnes il y a cinq ans, compte désormais plus de 2000 collaborateurs répartis dans 12 pays. Elle prévoit de recruter 300 ingénieurs supplémentaires d'ici la fin de l'année.",
                'category' => 'Économie'
            ]
        ];
        
        // Créer des posts avec contenu réaliste
        foreach ($posts as $postData) {
            $title = $postData['title'];
            Post::create([
                'user_id' => $users->random()->id,
                'post_date' => Carbon::now()->subDays(rand(1, 60))->format('Y-m-d'),
                'post_content' => $postData['content'],
                'post_title' => $title,
                'post_status' => $statuses[array_rand($statuses)],
                'post_name' => str_replace([' ', '\''], ['-', ''], strtolower($title)),
                'post_type' => 'article',
                'post_category' => $postData['category']
            ]);
        }
    }
}
