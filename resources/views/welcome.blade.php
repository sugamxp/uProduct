<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Page Title</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" media="screen" href="{{ asset('css/app.css') }}" />
    <script src="main.js"></script>
    <style>
        *,.select:after{box-sizing:border-box}*{font-family:Roboto,sans-serif}body{margin:0;background:#ffffff;-webkit-text-size-adjust:100%;-ms-text-size-adjust:100%;text-size-adjust:100%}.news{padding:10px;text-align:center;font-size:0}.news article{display:inline-block;max-width:400px;margin:10px;background:#eee;text-align:left;vertical-align:top;font-size:1rem;box-shadow:0 0 40px -10px #000;overflow:hidden}.news article img{width:100%;height:200px;-o-object-fit:cover;object-fit:cover;-webkit-box-reflect:below 0 linear-gradient(0deg,rgba(0,0,0,.5),transparent 50%)}.news article .text{padding:20px;color:#333}.news article .text h1{margin:0 0 .5em;font-weight:500}.news article .text p{margin:0 0 1em}.news article .text p:last-child{margin:0}@media (max-width:600px){.news{padding:0}.news article{display:block;max-width:100%;margin:0 0 20px}.news article:last-child{margin:0}}.section-dropdown{width:300px;display:block;margin:50px auto;text-align:center}.select,select{height:40px;width:240px}.select{border:1px solid #cacaca;overflow:hidden;position:relative;display:block}#loading,.select:after{height:100%;text-align:center}select{padding:5px;border:0;font-size:16px;-webkit-appearance:none;-moz-appearance:none;appearance:none}.select:after{content:"\f0dc";font-family:FontAwesome;color:#000;padding:12px 8px;position:absolute;right:0;top:0;background:#e3f2fd;z-index:1;width:10%;pointer-events:none}#loading{background-color:#fff;width:100%;position:fixed;z-index:9999}.select-header{text-align:left;padding-left:54px}
</style>
</head>

<body>

    <div id="appendDivNews">
        {{ csrf_field() }}
        <section id="content" class="section-dropdown">
            <p class="select-header"> Select a news source: </p>
            <label class="select">
                <select name="news_sources" id="news_sources" class="form-control">
                    <option value="{{@$source_id}}">{{$source_name}}</option>
                    @foreach ($news_sources as $news_source)
                    <option value="{{$news_source['id']}} : {{$news_source['name'] }}">{{$news_source['name']}}</option>
                    @endforeach
                </select>
            </label>

        </section>
        <section class="news">
            @foreach($news as $selected_news)
            <article>
                <img src="{{$selected_news['urlToImage']}}" alt="" />
                <div class="text">
                    <h1>{{$selected_news['title']}}</h1>
                    <p style="font-size: 14px">{{$selected_news['description']}} <a href="{{$selected_news['url']}}"
                            target="_blank"><small>read more...</small></a> </p>
                    <div style="padding-top: 5px;font-size: 12px">Author: {{$selected_news['author'] or "Unknown" }}</div>
                    @if($selected_news['publishedAt'] != null)
                    <div style="padding-top: 5px;">Date Published: {{
                        Carbon\Carbon::parse($selected_news['publishedAt'])->format('l jS \\of F Y ') }}</div>
                    @else
                    <div style="padding-top: 5px;">Date Published: Unknown</div>

                    @endif

                </div>
            </article>
            @endforeach
        </section>
    </div>

    <script src="https://code.jquery.com/jquery-3.3.1.js" integrity="sha256-2Kok7MbOyxpgUVvAk/HJ2jigOSYS2auK4Pfzbm7uH60="
        crossorigin="anonymous"></script>

    <script type="text/javascript">
        $(document).ready(function () {
            console.log('ready');
            $(document).on('change', 'select', function (event) {
                var source = this.value;  //gets the selected news source from the news source dropdown menu
                console.log(source);
                var _token = $('input[name="_token"]').val();

                $.ajax({
                    type: "POST",
                    url: "news/source_id",
                    data: { source: source, _token: _token }, //posts the selected option to our ApiController file
                    success: function (result) {
                        // On success it gets `result`, which is a full html page that displays topnews from the news source selected.

                        $('#appendDivNews').html(result);    // Append the html result to the div that has an id  of  `appendDivNews`
                    },

                    error: function () {
                        alert("An error occoured, please try again!")
                    }
                });

            })
        });
    </script>
</body>

</html>