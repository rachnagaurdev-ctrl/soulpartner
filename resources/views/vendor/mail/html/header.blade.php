@props(['url'])
<tr>
<td class="header">
<a href="{{ $url }}" style="display: inline-block;">
    @php
        $logo = \App\Models\Setting::get('logo') ? get_storage_url(\App\Models\Setting::get('logo')) : asset('assets/images/logo.png');
    @endphp
    <img src="{{ $logo }}" class="logo" alt="{{ \App\Models\Setting::get('site_name', 'Soulmate India') }}" style="max-height: 50px;">
</a>
</td>
</tr>
