<select id='{{id}}' name='{{id}}' class='{{styleClass}}'>
    {% for value in values %}
        <option value='{{value.id}}'
            {% if selected is same as(value.id) %}
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