<?php get_header(); ?>
<div class="container mx-auto px-4">
  <div class="w-full py-12">
    <h3 class="text-2xl md:text-4xl font-family-oswald uppercase text-black mb-7 font-medium">
      Últimas noticias y eventos
    </h3>
    <div class="grid grid-cols-12 gap-4">
      <div class="col-span-12 md:col-span-6 lg:col-span-8">
        <?php
        if (class_exists('NewsWidget2')) {
          the_widget(
            'NewsWidget2',
            array(
              'numberPost' => 3
            )
          );
        }
        ?>
      </div>
      <div class="col-span-12 md:col-span-6 lg:col-span-4 tablePosition bg-[#D9D9D9] p-5">
        <?php
        if (class_exists('SP_Widget_League_Table')) {
          // Obtener el ID del término de la liga actual
          $current_term = get_queried_object();
          $league_id = $current_term->term_id;
          the_widget(
            'SP_Widget_League_Table', // Nombre de la clase del widget de SportsPress
            array( // Parámetros de instancia (opciones del widget)
              'align' => 'none',
              'title' => 'Tabla de posiciones', // Título que quieres para el widget
              'id' => $league_id, // Filtrar la tabla por la liga actual
              'order' => 'DESC', // Orden ascendente o descendente
              'show_team_logo' => true,
              'columns' => array( // Columnas a mostrar (ejemplo)
                'name',
                'p',
                'w',
                'd',
                'l',
                'pts'
              ),
              'number' => 7,
              /*
              'show_full_table_link' => true,
              'limit' => -1, // -1 para mostrar todos los equipos, o un número para limitar
              'team' => null, // Puedes dejarlo en null para mostrar todos los equipos de la liga
              'season' => null, // null para la temporada actual o un ID específico
              'grouping' => null, // Puedes especificar 'division', 'conference', etc.
              'status' => null, // null para todos los estados de equipo
              'orderby' => 'name', // Cómo ordenar (name, position, etc.)
              'show_overall' => 'yes', // Mostrar estadísticas generales
              'show_home' => 'no', // No mostrar estadísticas de casa
              'show_away' => 'no', // No mostrar estadísticas de visitante
              'show_tie_breakers' => 'no', // No mostrar desempates
              'show_rankings' => 'yes', // Mostrar rankings
              'link_teams' => 'yes', // Enlazar nombres de equipos
            */
            )
          );
        } else {
          echo '<p>El widget de tabla de liga de SportsPress no está disponible.</p>';
        }
        ?>
        <div class="bg-white px-4 py-4 -mt-5">
          <a href="<?php echo home_url('/posiciones', 'relative'); ?>" class=" text-tarawera-950 bg-scooter-500 font-family-oswald font-normal uppercase text-lg text-center py-4 px-2 block">Ver tabla completa</a>
        </div>
      </div>
    </div>
  </div>
  <div class="w-full py-12">
    <h3 class="text-2xl md:text-4xl font-family-oswald uppercase text-black mb-7 font-medium">
      Top jugadores
    </h3>
    <?php
    if (class_exists('AnotationPayersWidget')) {
      the_widget(
        'AnotationPayersWidget',
        array(
          'numberPost' => 5,
          'leagueId' => $league_id
        )
      );
    }
    ?>
  </div>
  <div class="w-full py-12">
    <h3 class="text-2xl md:text-4xl font-family-oswald uppercase text-black mb-7 font-medium">
      Galería
    </h3>
    <?php
    if (class_exists('Gallery1Widget')) {
      the_widget(
        'Gallery1Widget',
        array(
          'numberPost' => 5,
          'spLeagues' => array($league_id)
        )
      );
    }
    ?>
  </div>
  <div class="w-full py-12">
    <?php
    if (class_exists('SponsorsWidget')) {
      the_widget(
        'SponsorsWidget',
        array(
          'numberPost' => 5
        )
      );
    }
    ?>
  </div>
</div>
<?php get_footer(); ?>
