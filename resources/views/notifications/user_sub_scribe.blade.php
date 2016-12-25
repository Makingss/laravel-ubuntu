<li>
    <a href="{{action("Notification@is_read",[$notification->notifiable_id])}}">
        {{$notification->data['subScribe_at']['date']}}
    </a>
</li>