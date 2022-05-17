<?php
/**
 * Template Name: Categories
 */
?>
<?php get_header(); ?>

<section class="container">
    <div class="row">

		<?php
		$args       = array(
			'orderby' => 'slug',
			'parent'  => 0
		);
		$categories = get_categories( $args );

		$array = array();

		foreach ( $categories as $category ) {

			$array[] = [
				'tag'   => $category->name,
				'count' => $category->count,
			];

		}
		?>

        <div class="col-lg-12">

            <script src="https://cdn.amcharts.com/lib/4/core.js"></script>
            <script src="https://cdn.amcharts.com/lib/4/charts.js"></script>
            <script src="https://cdn.amcharts.com/lib/4/plugins/wordCloud.js"></script>
            <script src="https://cdn.amcharts.com/lib/4/themes/animated.js"></script>

            <script>
                am4core.ready(function () {

                    am4core.useTheme(am4themes_animated);

                    const chart = am4core.create("chartdiv", am4plugins_wordCloud.WordCloud);
                    chart.fontFamily = "Courier New";
                    const series = chart.series.push(new am4plugins_wordCloud.WordCloudSeries());
                    series.randomness = 0.1;
                    series.rotationThreshold = 0.2;


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

                    series.labels.template.url = "<?php echo bloginfo( 'wpurl' );?>/category/{word}";
                    series.labels.template.urlTarget = "_blank";
                    series.labels.template.tooltipText = "{word}: {value}";

                    const hoverState = series.labels.template.states.create("hover");
                    hoverState.properties.fill = am4core.color("#FF0000");



                    var title = chart.titles.create();
                    title.text = "Most Popular Categories in <?php bloginfo( 'name' ); ?>";
                    title.fontSize = 20;
                    title.color = "#00FF00";
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

