@extends('layouts.admin')
@section('content')
    <style>
        :root {
            --color-one: #e6e6ff;
            --color-two: #1a1aff;
            --color-three: #b3b3ff;
        }

        body {
            font-family: 'Roboto', sans-serif;
            font-style: normal;
            font-weight: 300;
            background-color: var(--color-one);
            font-size: 0.95em;
            color: #222;
        }



        .cardhov {
            border: 1px solid var(--color-three);
            margin-bottom: 20px;
            transition: border 0.1s, transform 0.3s;
        }

        .cardhov:hover {
            border: 1px solid var(--color-two);

            cursor: pointer;
        }

        .cardhov .card-body h2 {
            color: var(--color-two);
        }


        .card-p {
            color: var(--color-three);
        }

        .card-p i {
            color: var(--color-two);
            margin-right: 8px;
        }
        .removestuff {
            color: black;
        }
        .removestuff:hover {
            text-decoration: none;
            color: black
        }
        .card-title{
            color: black!important;
            text-align: center;
        }
    </style>
<div class="content">
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">
                    {{ trans('global.dashboard') }}
                </div>

                <div class="card-body">
                    <p>{{ trans('global.additional.welcome') }} <b style="font-weight: bold">{{ auth()->user()->name }}</b></p>
                    @if(session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                        @if(auth()->user()->isStudent)
                        <div class="contaianer">
                            <div class="row">
                                <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">
                                    <a href="/learn/courses" class="removestuff">
                                    <div class="card cardhov">
                                        <div class="d-flex justify-content-center align-items-center pt-4">
                                            <i class="fa-fw fas fa-book-open text-center" style="font-size: 44px"></i>
                                        </div>

                                        <div class="card-body">
                                            <h2 class="card-title">{{ trans('cruds.course.title') }}</h2>
                                        </div>
                                    </div>
                                    </a>
                                </div>

                                <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">
                                    <a href="/learn/tests" class="removestuff">
                                        <div class="card cardhov">
                                            <div class="d-flex justify-content-center align-items-center pt-4">
                                                <i class="fa-fw fas fa-edit text-center" style="font-size: 44px"></i>
                                            </div>

                                            <div class="card-body">
                                                <h2 class="card-title">{{ trans('cruds.test.title') }}</h2>
                                            </div>
                                        </div>
                                    </a>
                                </div>

                                <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">
                                    <a href="/learn/test-results" class="removestuff">
                                        <div class="card cardhov">
                                            <div class="d-flex justify-content-center align-items-center pt-4">
                                                <i class="fa-fw fas fa-file text-center" style="font-size: 44px"></i>
                                            </div>

                                            <div class="card-body">
                                                <h2 class="card-title">{{ trans('cruds.testResult.title') }}</h2>
                                            </div>
                                        </div>
                                    </a>
                                </div>

                            </div>
                        </div>

                            @elseif(auth()->user()->isProfessor || auth()->user()->isAdmin)
                        <div class="contaainer">
                            <div class="row">

                                @if(auth()->user()->isAdmin)
                                    <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">
                                        <a href="admin/permissions" class="removestuff">
                                            <div class="card cardhov">
                                                <div class="d-flex justify-content-center align-items-center pt-4">
                                                    <i class="fa-fw fas fa-unlock-alt text-center" style="font-size: 44px"></i>
                                                </div>

                                                <div class="card-body">
                                                    <h2 class="card-title">{{ trans('cruds.permission.title') }}</h2>
                                                </div>
                                            </div>
                                        </a>
                                    </div>

                                    <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">
                                        <a href="admin/roles" class="removestuff">
                                            <div class="card cardhov">
                                                <div class="d-flex justify-content-center align-items-center pt-4">
                                                    <i class="fa-fw fas fa-briefcase text-center" style="font-size: 44px"></i>
                                                </div>

                                                <div class="card-body">
                                                    <h2 class="card-title">{{ trans('cruds.role.title') }}</h2>
                                                </div>
                                            </div>
                                        </a>
                                    </div>

                                    <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">
                                        <a href="admin/users" class="removestuff">
                                            <div class="card cardhov">
                                                <div class="d-flex justify-content-center align-items-center pt-4">
                                                    <i class="fa-fw fas fa-user text-center" style="font-size: 44px"></i>
                                                </div>

                                                <div class="card-body">
                                                    <h2 class="card-title">{{ trans('cruds.user.title') }}</h2>
                                                </div>
                                            </div>
                                        </a>
                                    </div>
                                @endif


                                <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">
                                    <a href="admin/courses" class="removestuff">
                                        <div class="card cardhov">
                                            <div class="d-flex justify-content-center align-items-center pt-4">
                                                <i class="fa-fw fas fa-book-open text-center" style="font-size: 44px"></i>
                                            </div>

                                            <div class="card-body">
                                                <h2 class="card-title">{{ trans('cruds.course.title') }}</h2>
                                            </div>
                                        </div>
                                    </a>
                                </div>

                                <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">
                                    <a href="admin/lessons" class="removestuff">
                                        <div class="card cardhov">
                                            <div class="d-flex justify-content-center align-items-center pt-4">
                                                <i class="fa-fw fas fa-book text-center" style="font-size: 44px"></i>
                                            </div>

                                            <div class="card-body">
                                                <h2 class="card-title">{{ trans('cruds.lesson.title') }}</h2>
                                            </div>
                                        </div>
                                    </a>
                                </div>

                                <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">
                                    <a href="admin/tests" class="removestuff">
                                        <div class="card cardhov">
                                            <div class="d-flex justify-content-center align-items-center pt-4">
                                                <i class="fa-fw fas fa-edit text-center" style="font-size: 44px"></i>
                                            </div>

                                            <div class="card-body">
                                                <h2 class="card-title">{{ trans('cruds.test.title') }}</h2>
                                            </div>
                                        </div>
                                    </a>
                                </div>

                                <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">
                                    <a href="admin/questions" class="removestuff">
                                        <div class="card cardhov">
                                            <div class="d-flex justify-content-center align-items-center pt-4">
                                                <i class="fa-fw fas fa-question text-center" style="font-size: 44px"></i>
                                            </div>

                                            <div class="card-body">
                                                <h2 class="card-title">{{ trans('cruds.question.title') }}</h2>
                                            </div>
                                        </div>
                                    </a>
                                </div>

                                <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">
                                    <a href="admin/question-options" class="removestuff">
                                        <div class="card cardhov">
                                            <div class="d-flex justify-content-center align-items-center pt-4">
                                                <i class="fa-fw fas fa-question-circle text-center" style="font-size: 44px"></i>
                                            </div>

                                            <div class="card-body">
                                                <h2 class="card-title">{{ trans('cruds.questionOption.title') }}</h2>
                                            </div>
                                        </div>
                                    </a>
                                </div>

                                <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">
                                    <a href="admin/test-results" class="removestuff">
                                        <div class="card cardhov">
                                            <div class="d-flex justify-content-center align-items-center pt-4">
                                                <i class="fa-fw fas fa-file text-center" style="font-size: 44px"></i>
                                            </div>

                                            <div class="card-body">
                                                <h2 class="card-title">{{ trans('cruds.testResult.title') }}</h2>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                                <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">
                                    <a href="admin/notifications" class="removestuff">
                                        <div class="card cardhov">
                                            <div class="d-flex justify-content-center align-items-center pt-4">
                                                <i class="fa-fw fas fa-bullhorn text-center" style="font-size: 44px"></i>
                                            </div>

                                            <div class="card-body">
                                                <h2 class="card-title">{{ trans('cruds.notification.title') }}</h2>
                                            </div>
                                        </div>
                                    </a>
                                </div>

                            </div>
                        </div>

                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('scripts')
@parent

@endsection
