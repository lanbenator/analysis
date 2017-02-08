<tr>
{% for value in values %}
    <td><input type='radio' name='{{id}}' value='{{value.id}}' id='{{value.id}}'
    {% if selected is same as(value.id) %}
        checked="true"
    {%endif%}
            />
    </td>
    <td>{{value.name}}</td>
    <td>
    {% if value.tip %)
        {{printInfo(value.tip)}}
    (% endif %})
    </td>
</tr>
