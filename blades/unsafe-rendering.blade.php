<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <!-- ok: unsafe-rendering -->
    <div>{{{ $value }}}</div>
    <!-- ok: unsafe-rendering -->
    <div>{{ 'halo' }}</div>
    <!-- ruleid: unsafe-rendering -->
    <div>{{ doSomething($value) }}</div>
    <!-- ruleid: unsafe-rendering -->
    <div class="{{ $value }}"></div>
    <!-- ruleid: unsafe-rendering -->
    <div class="{{ $value1 . $value2 }}"></div>
    <!-- ruleid: unsafe-rendering -->
    <div class="{{$value }}"></div>
    <!-- ruleid: unsafe-rendering -->
    <div class="{{$value}}"></div>
    <!-- ruleid: unsafe-rendering -->
    <div class="{{   $value   }}"></div>
    <div>
        <!-- ruleid: unsafe-rendering -->
        {{ $value }}
    </div>
    <!-- ok: unsafe-rendering -->
    {{ Form::open(['id' => $courseId]) }}
    <!-- ok: unsafe-rendering -->
    {{ Form::close() }}
    <!-- ok: unsafe-rendering -->
    {{ \DicodingUtils\ViewHelpers\HtmlDecode::renderSafely($value) }}
    <!-- ruleid: unsafe-rendering -->
    <div>{{ \Str::lower($value2) }}</div>
    <!-- ok: unsafe-rendering -->
    <div>{{{ \Str::lower($value2) }}}</div>
    <!-- ok: unsafe-rendering -->
    {{ \DicodingUtils\Images\ImageTag::lazyImage($logoUrl, 'academy', 'original', '', 'course-card__logo') }}
    <!-- ok: unsafe-rendering -->
    <div>{{ $leaderboard->appends(['course_id' => e(Input::old('course_id', 0))])->links() }}</div>
    <!-- ok: unsafe-rendering -->
    {{ !\Util::isEmpty($selected_submitter ?? null) ? json_encode($selected_submitter) : 'null' }}
    <!-- ruleid: unsafe-rendering -->
    {{ !\Util::isEmpty($selected_submitter ?? null) ? jsonDanger($selected_submitter) : 'null' }}

</body>
</html>