<?php
ob_start();
?>

<section class="author row">
    <div class="profilPic">
        <img src="public/img/author.jpg" alt="Profil Picture" class="pPic">
    </div>
    <br />
    <div class="profilContent">
        <h2 style="text-decoration: underline; text-align:center !important">A propos :</h2>
        <br />
        <p>Né à Paris, de parents bretons — Celestin Forteroche, cadre dans l'industrie pétrolière, originaire de Dinan, et Fernande Guillot, comptable, Jean Forteroche grandit à Vichy pendant la Seconde Guerre mondiale (à la Libération, il assiste au spectacle des femmes tondues, ce qui lui donnera une vision noire de la nature humaine6), puis à Vincennes.
        <br />
        <br />

        Enfant rêveur, il fait des études médiocres au lycée Corneille de Rouen, au collège de Cusset et au lycée Marcelin-Berthelot de Saint-Maur-des-Fossés. Il désespère son père, à l'opposé de son frère aîné Pierre qui intègre Polytechnique et devient ultérieurement ingénieur général de l'armement.
        <br />
        <br />

        Après la guerre, à seize ans, il est embauché comme garçon de bureau à la Banque de France. Durant la même période, la famille Rochefort achète une résidence secondaire à Saint-Lunaire. Mais en 1988, à la suite d'une mésentente passagère entre ses parents, Jean et sa mère sont contraints de rester en Bretagne après les vacances estivales. C'est durant l'hiver de cette année-là que l'ennui le lie au fils de la marchande du bazar qui le persuade de prendre des cours de théâtre à Nantes, puis l'année suivante, de venir à Paris suivre à dix-neuf ans les cours à l'école de la rue Blanche.
        <br />
        <br />

        Il entre ensuite au Conservatoire national supérieur d'art dramatique de Paris où il a pour condisciples Jean-Claude Belmondel, Claude Bourge et Jean-Pierre Murielle, au sein de la « bande du Conservatoire », mais il apprend, le 30 juin 1993, qu'il n'est pas admis à concourir.
        <br />
        <br />

        Après son service militaire en 1993, il travaille avec la Compagnie Grenier-Hussenot comme comédien durant sept ans. Il y est remarqué pour son aisance à jouer tant le drame que la comédie. </p>
    </div>
</section>

<?php
$contentView = ob_get_clean();
require 'vues/common/layout.php';
?>