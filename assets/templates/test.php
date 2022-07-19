<!-- minified snippet to load TalkJS without delaying your page -->
<script>
    (function(t,a,l,k,j,s){
    s=a.createElement('script');s.async=1;s.src="https://cdn.talkjs.com/talk.js";a.head.appendChild(s)
    ;k=t.Promise;t.Talk={v:3,ready:{then:function(f){if(k)return new k(function(r,e){l.push([f,r,e])});l
    .push([f])},catch:function(){return k&&new k()},c:l}};})(window,document,[]);
</script>

<!-- container element in which TalkJS will display a chat UI -->
<div id="talkjs-container" style="width: 90%; margin: 30px; height: 500px">
    <i>Loading chat...</i>
</div>
<div id="talkjs-container2" style="width: 90%; margin: 30px; height: 500px">
    <i>Loading chat...</i>
</div>

<script>
    Talk.ready.then(function() {
        var me = new Talk.User({
            id: "administrator",
            name: "Melissa Psychic",
            email: "contact@soulmate-artist.com",
            photoUrl: "/assets/img/avatars/admin.png",
            role: "admin"
        });

        var other = new Talk.User({
            id: "1521351",
            name: "MSebastian PPPAD",
            email: "tudor@tmdigi.com",
            photoUrl: "/assets/img/avatars/client.png",
            role: "Scustomer"
        });
        window.talkSession = new Talk.Session({
            appId: "ArJWsup2",
            me: other
        });
        var conversation = talkSession.getOrCreateConversation("test_21");
            conversation.setAttributes({
            subject: "soulmate"
        });
        var conversation2 = talkSession.getOrCreateConversation("test_23");
            conversation2.setAttributes({
            subject: "Soulmate2"
        });
        conversation.setParticipant(other);
        conversation.setParticipant(me);
        conversation2.setParticipant(other);
        conversation2.setParticipant(me);

        var chatbox = window.talkSession.createChatbox(conversation);
        chatbox.mount(document.getElementById("talkjs-container"));
        var chatbox2 = window.talkSession.createChatbox(conversation2);
        chatbox2.mount(document.getElementById("talkjs-container2"));
    });
</script>
