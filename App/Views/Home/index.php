{% extends "base.html" %}

{% block title %}Home{% endblock %}

{% block body %}
        {{ dump(session) }}
        {{ dump(com) }}
        {% if session and session.username %}
            <h1>Bonjour, {{ session.username }}</h1>
            <p>Créer <a href="./post/create/">ici</a> un post !</p>
            <br>
            <a href="./deconnexion/">Déconnectez {{ session.username }}</a>
            <br><br>
            
                {% for users in user %}
            <div style="height: auto; width:200px; color: white;background-color: black;text-align: center;border-radius: 5px;padding: 5px 5px 20px 5px;">
                <h2>Titre : {{ users.BIL_TITRE }}</h2><br>
                <p>Contenu : {{ users.BIL_CONTENU }}</p>
                <p>Date :  {{ users.BIL_DATE }} </p>
                <p>Posté par : {{ users.nom }}</p>
                <p>Commentaires : </p>
                    {% for coms in com %}
                        {% if coms.BIL_ID == users.BIL_ID %}
                        <h3>{{ coms.COM_AUTEUR }} a posté le {{ coms.COM_DATE }} : {{ coms.COM_CONTENU }}</h3>
                        <br>
                       
                        {% endif %}
                    {% endfor %}
                <form action="./commentaires/create" method="POST">
                    <label>Contenu</label>
                    <input type="hidden" name="bil_id" value={{ users.BIL_ID }}>
                    <input type="text" name="com">
                    <button type="submit">Envoyer</button>
                </form>
            </div><br>
                {% endfor %}
        {% else %}
            <h1>Vous n'êtes pas connecté, inscrivez-vous <a href="./inscription/">ici</a> ou connectez-vous <a href="./connexion/">ici</a></h1>
        {% endif %}

{% endblock %}
