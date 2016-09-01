<select id='{{id}}' name='{{name}}' class='{{styleClass}}'>
    <option value='false'>all</option>
    {% for value in values %}
        <option value='{{value.id}}'
            {% if value.selected %}
                selected='selected'
            {% endif %}
        >
            {{value.name}}
            {% if value.filterDb %}
                (n={{countDbContent(exprtable, clintable, value.filterDb)}})
            {% endif %}
        </option>
    {% endfor %}
</select>