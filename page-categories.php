<?php
/**
 * Template Name: Categories
 */
?>
<?php get_header(); ?>

<section class="container">
    <div class="row">
        <ol class="terminal-oc">
			<?php
			$args       = array(
				'orderby' => 'slug',
				'parent'  => 0
			);
			$categories = get_categories( $args );

            $array = array();

			foreach ( $categories as $category ) {

				$array[] = [
					'tag' => $category->name,
					'count' => $category->count,
				];

//                echo '<li class="list-group-item d-flex align-items-center"><a href="' . get_category_link( $category->term_id ) . '" rel="bookmark"><i class="fa fa-chevron-right" aria-hidden="true"></i>' . $category->name . '<span> -> ' . $category->category_count . '</span></a></li>';
			}
			?>
        </ol>
        <div class="col-lg-12">

            <script src="https://cdn.amcharts.com/lib/4/core.js"></script>
            <script src="https://cdn.amcharts.com/lib/4/charts.js"></script>
            <script src="https://cdn.amcharts.com/lib/4/plugins/wordCloud.js"></script>
            <script src="https://cdn.amcharts.com/lib/4/themes/animated.js"></script>

            <script>
                am4core.ready(function () {

                    am4core.useTheme(am4themes_animated);

                    var chart = am4core.create("chartdiv", am4plugins_wordCloud.WordCloud);
                    chart.fontFamily = "Courier New";
                    var series = chart.series.push(new am4plugins_wordCloud.WordCloudSeries());
                    series.randomness = 0.1;
                    series.rotationThreshold = 0.5;


                    series.data = <?php echo json_encode( $array ); ?>;



                    series.dataFields.word = "tag";
                    series.dataFields.value = "count";

                    series.heatRules.push({
                        "target": series.labels.template,
                        "property": "fill",
                        "min": am4core.color("#e8e8e8"),
                        "max": am4core.color("#00FF00"),
                        "dataField": "value"
                    });

                    series.labels.template.url = "<?php echo bloginfo('wpurl');?>/category/{word}";
                    series.labels.template.urlTarget = "_blank";
                    series.labels.template.tooltipText = "{word}: {value}";

                    var hoverState = series.labels.template.states.create("hover");
                    hoverState.properties.fill = am4core.color("#FF0000");

                    var subtitle = chart.titles.create();
                    subtitle.text = "(click to open)";

                    var title = chart.titles.create();
                    title.text = "Most Popular Categories @ <?php bloginfo( 'name' ); ?>";
                    title.fontSize = 20;
                    title.fontWeight = "800";

                }); // end am4core.ready()
            </script>
            <div id="chartdiv"></div>
        </div>
    </div>
</section>

<style>
    #chartdiv {
        width: 100%;
        height: 80vh;
    }
</style>
<?php get_footer() ?>

