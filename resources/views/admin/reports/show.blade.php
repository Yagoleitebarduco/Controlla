<!-- Em uma nova view: resources/views/admin/reports/show.blade.php -->
<iframe src="{{ asset('storage/reports/' . $report->filename) }}" width="100%" height="800" frameborder="0"></iframe>