<style>
    .student-bg {
        background: #002b58!important;
    }
    .admin-bg {
        background: #a90000!important;
    }
    .admin-bg .c-sidebar-nav-link:hover,.c-sidebar-nav-dropdown-toggle:hover {
        background: #d12e2e !important;
    }
</style>
<div id="sidebar" class="c-sidebar c-sidebar-fixed c-sidebar-lg-show {{ auth()->user()->isStudent ? 'student-bg' : '' }} {{ auth()->user()->isAdmin ? 'admin-bg' : '' }}">

    <div class="c-sidebar-brand d-md-down-none">
        <a class="c-sidebar-brand-full h4" href="#">
            {{ trans('panel.site_title') }}
        </a>
    </div>

    @if(auth()->user()->isAdmin || auth()->user()->isProfessor)
        <ul class="c-sidebar-nav">
            <li class="c-sidebar-nav-item">
                <a href="{{ route("admin.home") }}" class="c-sidebar-nav-link">
                    <i class="c-sidebar-nav-icon fas fa-fw fa-tachometer-alt">

                    </i>
                    {{ trans('global.dashboard') }}
                </a>
            </li>
            @can('user_management_access')
                <li class="c-sidebar-nav-dropdown {{ request()->is("admin/permissions*") ? "c-show" : "" }} {{ request()->is("admin/roles*") ? "c-show" : "" }} {{ request()->is("admin/users*") ? "c-show" : "" }}">
                    <a class="c-sidebar-nav-dropdown-toggle" href="#">
                        <i class="fa-fw fas fa-users c-sidebar-nav-icon">

                        </i>
                        {{ trans('cruds.userManagement.title') }}
                    </a>
                    <ul class="c-sidebar-nav-dropdown-items">
                        @can('permission_access')
                            <li class="c-sidebar-nav-item">
                                <a href="{{ route("admin.permissions.index") }}"
                                   class="c-sidebar-nav-link {{ request()->is("admin/permissions") || request()->is("admin/permissions/*") ? "c-active" : "" }}">
                                    <i class="fa-fw fas fa-unlock-alt c-sidebar-nav-icon">

                                    </i>
                                    {{ trans('cruds.permission.title') }}
                                </a>
                            </li>
                        @endcan
                        @can('role_access')
                            <li class="c-sidebar-nav-item">
                                <a href="{{ route("admin.roles.index") }}"
                                   class="c-sidebar-nav-link {{ request()->is("admin/roles") || request()->is("admin/roles/*") ? "c-active" : "" }}">
                                    <i class="fa-fw fas fa-briefcase c-sidebar-nav-icon">

                                    </i>
                                    {{ trans('cruds.role.title') }}
                                </a>
                            </li>
                        @endcan
                        @can('user_access')
                            <li class="c-sidebar-nav-item">
                                <a href="{{ route("admin.users.index") }}"
                                   class="c-sidebar-nav-link {{ request()->is("admin/users") || request()->is("admin/users/*") ? "c-active" : "" }}">
                                    <i class="fa-fw fas fa-user c-sidebar-nav-icon">

                                    </i>
                                    {{ trans('cruds.user.title') }}
                                </a>
                            </li>
                        @endcan
                    </ul>
                </li>
            @endcan
            @can('course_access')
                <li class="c-sidebar-nav-item">
                    <a href="{{ route("admin.courses.index") }}"
                       class="c-sidebar-nav-link {{ request()->is("admin/courses") || request()->is("admin/courses/*") ? "c-active" : "" }}">
                        <i class="fa-fw fas fa-book-open c-sidebar-nav-icon">

                        </i>
                        {{ trans('cruds.course.title') }}
                    </a>
                </li>
            @endcan
            @can('lesson_access')
                <li class="c-sidebar-nav-item">
                    <a href="{{ route("admin.lessons.index") }}"
                       class="c-sidebar-nav-link {{ request()->is("admin/lessons") || request()->is("admin/lessons/*") ? "c-active" : "" }}">
                        <i class="fa-fw fas fa-book c-sidebar-nav-icon">

                        </i>
                        {{ trans('cruds.lesson.title') }}
                    </a>
                </li>
            @endcan
            @can('test_access')
                <li class="c-sidebar-nav-item">
                    <a href="{{ route("admin.tests.index") }}"
                       class="c-sidebar-nav-link {{ request()->is("admin/tests") || request()->is("admin/tests/*") ? "c-active" : "" }}">
                        <i class="fa-fw fas fa-edit c-sidebar-nav-icon">

                        </i>
                        {{ trans('cruds.test.title') }}
                    </a>
                </li>
            @endcan
            @can('question_access')
                <li class="c-sidebar-nav-item">
                    <a href="{{ route("admin.questions.index") }}"
                       class="c-sidebar-nav-link {{ request()->is("admin/questions") || request()->is("admin/questions/*") ? "c-active" : "" }}">
                        <i class="fa-fw fas fa-question c-sidebar-nav-icon">

                        </i>
                        {{ trans('cruds.question.title') }}
                    </a>
                </li>
            @endcan
            @can('question_option_access')
                <li class="c-sidebar-nav-item">
                    <a href="{{ route("admin.question-options.index") }}"
                       class="c-sidebar-nav-link {{ request()->is("admin/question-options") || request()->is("admin/question-options/*") ? "c-active" : "" }}">
                        <i class="fa-fw fas fa-question-circle  c-sidebar-nav-icon">

                        </i>
                        {{ trans('cruds.questionOption.title') }}
                    </a>
                </li>
            @endcan
            @can('test_result_access')
                <li class="c-sidebar-nav-item">
                    <a href="{{ route("admin.test-results.index") }}"
                       class="c-sidebar-nav-link {{ request()->is("admin/test-results") || request()->is("admin/test-results/*") ? "c-active" : "" }}">
                        <i class="fa-fw fas fa-file c-sidebar-nav-icon">

                        </i>
                        {{ trans('cruds.testResult.title') }}
                    </a>
                </li>
            @endcan
{{--            @can('test_answer_access')--}}
{{--                <li class="c-sidebar-nav-item">--}}
{{--                    <a href="{{ route("admin.test-answers.index") }}"--}}
{{--                       class="c-sidebar-nav-link {{ request()->is("admin/test-answers") || request()->is("admin/test-answers/*") ? "c-active" : "" }}">--}}
{{--                        <i class="fa-fw fas fa-cogs c-sidebar-nav-icon">--}}

{{--                        </i>--}}
{{--                        {{ trans('cruds.testAnswer.title') }}--}}
{{--                    </a>--}}
{{--                </li>--}}
{{--            @endcan--}}
            @can('notification_access')
                <li class="c-sidebar-nav-item">
                    <a href="{{ route("admin.notifications.index") }}"
                       class="c-sidebar-nav-link {{ request()->is("admin/notifications") || request()->is("admin/notifications/*") ? "c-active" : "" }}">
                        <i class="fa-fw fas fa-bullhorn c-sidebar-nav-icon">

                        </i>
                        {{ trans('cruds.notification.title') }}
                    </a>
                </li>
            @endcan
            @if(file_exists(app_path('Http/Controllers/Auth/ChangePasswordController.php')))
                @can('profile_password_edit')
                    <li class="c-sidebar-nav-item">
                        <a class="c-sidebar-nav-link {{ request()->is('profile/password') || request()->is('profile/password/*') ? 'c-active' : '' }}"
                           href="{{ route('profile.password.edit') }}">
                            <i class="fa-fw fas fa-key c-sidebar-nav-icon">
                            </i>
                            {{ trans('global.change_password') }}
                        </a>
                    </li>
                @endcan
            @endif
            <li class="c-sidebar-nav-item">
                <a href="#" class="c-sidebar-nav-link"
                   onclick="event.preventDefault(); document.getElementById('logoutform').submit();">
                    <i class="c-sidebar-nav-icon fas fa-fw fa-sign-out-alt">

                    </i>
                    {{ trans('global.logout') }}
                </a>
            </li>
        </ul>

    @else
        <ul class="c-sidebar-nav">
            <li class="c-sidebar-nav-item">
                <a href="{{ route("admin.home") }}" class="c-sidebar-nav-link">
                    <i class="c-sidebar-nav-icon fas fa-fw fa-tachometer-alt">

                    </i>
                    {{ trans('global.dashboard') }}
                </a>
            </li>

            @can('course_access')
                <li class="c-sidebar-nav-item">
                    <a href="{{ route("learn.courses.index") }}"
                       class="c-sidebar-nav-link {{ request()->is("admin/courses") || request()->is("admin/courses/*") ? "c-active" : "" }}">
                        <i class="fa-fw fas fa-book-open c-sidebar-nav-icon">

                        </i>
                        {{ trans('cruds.course.title') }}
                    </a>
                </li>
            @endcan

            @can('test_access')
                <li class="c-sidebar-nav-item">
                    <a href="{{ route("learn.tests.index") }}"
                       class="c-sidebar-nav-link {{ request()->is("admin/tests") || request()->is("admin/tests/*") ? "c-active" : "" }}">
                        <i class="fa-fw fas fa-edit c-sidebar-nav-icon">

                        </i>
                        {{ trans('cruds.test.title') }}
                        @php
                            $tests = auth()->user()->courses->map(function ($course) {
                                // return publish tests which are not taken by user
                                return $course->tests->where('is_published', true)->whereNotIn('id', auth()->user()->testResults->pluck('test_id'));
                            })->flatten();
                        @endphp
                        @if($tests->count() > 0)
                            <span class="badge badge-info">{{ $tests->count() }}</span>
                        @endif
{{--                        <span class="badge badge-sm bg-info ms-auto">NEW</span>--}}
                    </a>
                </li>
            @endcan
            @can('test_result_access')
                <li class="c-sidebar-nav-item">
                    <a href="{{ route("admin.test-results.index") }}"
                       class="c-sidebar-nav-link {{ request()->is("admin/test-results") || request()->is("admin/test-results/*") ? "c-active" : "" }}">
                        <i class="fa-fw fas fa-file c-sidebar-nav-icon">

                        </i>
                        {{ trans('cruds.testResult.title') }}
                    </a>
                </li>
            @endcan

            @if(file_exists(app_path('Http/Controllers/Auth/ChangePasswordController.php')))
                @can('profile_password_edit')
                    <li class="c-sidebar-nav-item">
                        <a class="c-sidebar-nav-link {{ request()->is('profile/password') || request()->is('profile/password/*') ? 'c-active' : '' }}"
                           href="{{ route('profile.password.edit') }}">
                            <i class="fa-fw fas fa-key c-sidebar-nav-icon">
                            </i>
                            {{ trans('global.change_password') }}
                        </a>
                    </li>
                @endcan
            @endif
            <li class="c-sidebar-nav-item">
                <a href="#" class="c-sidebar-nav-link"
                   onclick="event.preventDefault(); document.getElementById('logoutform').submit();">
                    <i class="c-sidebar-nav-icon fas fa-fw fa-sign-out-alt">

                    </i>
                    {{ trans('global.logout') }}
                </a>
            </li>
        </ul>
    @endif

</div>
