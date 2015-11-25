$(document).load(

    function() {

        $(document).load(
            function() {
                $('#myTabs a').click(function (e) {
                    e.preventDefault();
                    $(this).tab('show');
                });
            }
        );

    }
);

google.load('visualization', '1.0', {'packages':['corechart']});

google.setOnLoadCallback(drawChart);

function drawChart(){

    $.get("site/retrieve",
        function (result) {

            var html = "";
            html += "<table class='table table-striped table-bordered table-hover' id='videoListTable'>";
            html += "<thead><tr><th>Video Thumbnail</th><th>Video Title</th><th>Video Description</th><th>Channel Title</th><th>View Count</th><th>Comment Count</th><th>Like Count</th><th>Dislike Count</th><th>Subscribers Count</th></tr></thead>";
            html += "<tbody>";
            for (i = 0; i < result.length; i++) {
                html += "<tr>";
                html += "<td>";
                html += "<img src='" + result[i].video_thumbnail + "'/>";
                html += "</td>";
                html += "<td>";
                html += result[i].channel_title;
                html += "</td>";
                html += "<td>";
                html += result[i].video_title;
                html += "</td>";
                html += "<td>";
                html += result[i].video_description;
                html += "</td>";

                html += "<td>";
                html += result[i].views_count;
                html += "</td>";
                html += "<td>";
                html += result[i].comments_count;
                html += "</td>";
                html += "<td>";
                html += result[i].likes_count;
                html += "</td>";
                html += "<td>";
                html += result[i].dislikes_count;
                html += "</td>";
                html += "<td>";
                html += result[i].subscribers_count;
                html += "</td>";
                html += "</tr>";
            }
            html += "</tbody>";
            html += "</table>";
            $("#videosList").html(html);

// Create the data table.
            var data = new google.visualization.DataTable();
            data.addColumn('string', 'Topping');
            data.addColumn('number', 'View Count');

            for (i = 0; i < result.length; i++) {
                data.addRow([result[i].video_title, parseInt(result[i].views_count, 10)]);
            }


// Set chart options
            var options = {
                'title': 'Top-5 YouTube Videos View Count',
                'width': 800,
                'height': 400
            };

// Instantiate and draw our chart, passing in some options.
            var chart = new google.visualization.BarChart(document.getElementById('chart_div'));
            chart.draw(data, options);

            var data = new google.visualization.DataTable();
            data.addColumn('string', 'Topping');
            data.addColumn('number', 'Comment Count');

            for (i = 0; i < result.length; i++) {
                data.addRow([result[i].video_title, parseInt(result[i].comments_count, 10)]);
            }


// Set chart options
            var options = {
                'title': 'Top-5 YouTube Videos Comment Count',
                'width': 800,
                'height': 400
            };

// Instantiate and draw our chart, passing in some options.
            var chart = new google.visualization.BarChart(document.getElementById('chart2_div'));
            chart.draw(data, options);

            var data = new google.visualization.DataTable();
            data.addColumn('string', 'Topping');
            data.addColumn('number', 'Like Count');

            for (i = 0; i < result.length; i++) {
                data.addRow([result[i].video_title, parseInt(result[i].likes_count, 10)]);
            }


// Set chart options
            var options = {
                'title': 'Top-5 YouTube Videos Like Count',
                'width': 800,
                'height': 400
            };

// Instantiate and draw our chart, passing in some options.
            var chart = new google.visualization.BarChart(document.getElementById('chart3_div'));
            chart.draw(data, options);

            var data = new google.visualization.DataTable();
            data.addColumn('string', 'Topping');
            data.addColumn('number', 'Dislike Count');

            for (i = 0; i < result.length; i++) {
                data.addRow([result[i].video_title, parseInt(result[i].dislikes_count, 10)]);
            }


// Set chart options
            var options = {
                'title': 'Top-5 YouTube Videos Dislike Count',
                'width': 800,
                'height': 400
            };

// Instantiate and draw our chart, passing in some options.
            var chart = new google.visualization.BarChart(document.getElementById('chart4_div'));
            chart.draw(data, options);

            var data = new google.visualization.DataTable();
            data.addColumn('string', 'Topping');
            data.addColumn('number', 'Subscriber Count');

            for (i = 0; i < result.length; i++) {
                data.addRow([result[i].video_title, parseInt(result[i].subscribers_count, 10)]);
            }


// Set chart options
            var options = {
                'title': 'Top-5 YouTube Videos Subscriber Count',
                'width': 800,
                'height': 400
            };

// Instantiate and draw our chart, passing in some options.
            var chart = new google.visualization.BarChart(document.getElementById('chart5_div'));
            chart.draw(data, options);

        }
    );
}