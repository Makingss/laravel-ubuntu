<li>
    <a href="{{action("Notification@isRead",[$notification->id])}}">
        {{$notification->data['subScribe_at']['date']}}
    </a>
</li>