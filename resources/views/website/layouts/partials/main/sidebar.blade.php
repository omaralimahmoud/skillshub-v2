<div id="aside" class="col-md-3">

    <!-- exam details widget -->
    <ul class="list-group">
        <li class="list-group-item">{{ __('website.pages.exams.skill') }}: {{ $exam->skill->name }}</li>
        <li class="list-group-item">{{ __('website.pages.exams.questions') }} {{ $exam->question_number }}
        </li>
        <li class="list-group-item">{{ __('website.pages.exams.duration') }}: {{ $exam->duration_minutes }}
        </li>
        <li class="list-group-item">{{ __('website.pages.exams.difficulty') }}:


            @for ($i = 1; $i <= $exam->difficulty; $i++)
                <i class="fa fa-star"></i>
            @endfor


            @for ($i = 1; $i <= 5 - $exam->difficulty; $i++)
                <i class="fa fa-star-o"></i>
            @endfor


        </li>
    </ul>
    <!-- /exam details widget -->



</div>
