</div>
<!-- end main -->
</div>
<!-- end wrap -->

<footer class="footer container">
    <div class="row">
        <div class="col-md-24">
            <div class="row"><!-- begin social  -->
                <div class="social col-md-12 col-sm-12 col-xs-12">
                    <ul>
                        <li class="social__item"><a href="https://www.linkedin.com/in/%D1%82%D0%B8%D0%BC%D1%83%D1%80-%D0%BA%D0%B0%D1%80%D1%88%D0%B8%D0%B5%D0%B2-0337ba108?trk=nav_responsive_tab_profile">Linkedin</a></li>
                        <li class="social__item"><a href="https://vk.com/id69224639">Vkontakte</a></li>
                    </ul>
                </div>
                <!-- end social -->

                <!-- begin footer-email  -->
                <div class="footer-email col-md-12 col-sm-12 col-xs-12">
                    <p>Get in touch. Send an <a href="mailto:lollipop.fly@gmail.com">Email</a></p>
                </div>
                <!-- end footer-email --></div>
        </div>
    </div>
</footer>

<!-- SCRIPTS -->
<script src="{!! asset('build/js/global.min.js') !!}"></script>

{{-- Elixir livereload --}}
@if ( Config::get('app.debug') )
    <script type="text/javascript">
        document.write('<script src="//localhost:35729/livereload.js?snipver=1" type="text/javascript"><\/script>')
    </script>
    @endif
</body>
</html>