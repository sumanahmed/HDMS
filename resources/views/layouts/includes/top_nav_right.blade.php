<div class="uk-navbar-flip">
    <ul class="uk-navbar-nav user_actions">
        <li><a href="#" id="full_screen_toggle" class="user_action_icon uk-visible-large"><i class="material-icons md-24 md-light">&#xE5D0;</i></a></li>
        <li><a href="#" id="main_search_btn" class="user_action_icon"><i class="material-icons md-24 md-light">&#xE8B6;</i></a></li>
        <li data-uk-dropdown="{mode:'click',pos:'bottom-right'}">
            <a href="#" class="user_action_image"><img class="md-user-image" src="{{asset('img/logo.jpg')}}" alt=""/></a>
            <div class="uk-dropdown uk-dropdown-small">
                <ul class="uk-nav js-uk-prevent">
                    <li><a href="#">My profile</a></li>
                    <li><a href="">Settings</a></li>
                    <li><a href="{{ route("logout_cms") }}">Logout</a></li>
                </ul>
            </div>
        </li>
    </ul>
</div>