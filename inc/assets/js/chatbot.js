var botui = new BotUI('my-botui-app');
jQuery.ajax({
    url: '/wp-json/wp/v2/posts', //window.location.href,
    type: 'GET',
    data: {
      'filter[posts_per_page]': '-1',
    },
    success: function(data) {
        botui.message.bot({
            content: 'Willkommen bei Corona|Law. Was ist deine Frage?'
        }).then(function () {
            return botui.action.select({
                action: {
                    placeholder : "Was möchtest du wissen?", 
                    //value: 'TR', // Selected value or selected object. Example: {value: "TR", text : "Türkçe" }
                    searchselect : true, // Default: true, false for standart dropdown
                    label : 'text', // dropdown label variable
                    options : data.map((el) => {
                        return {
                            value: el.id,
                            text: el.title.rendered
                        };
                    }),
                    button: {
                      icon: 'check',
                      label: 'OK'
                    }
                }
            });
        }).then(function (res) { // will be called when a button is clicked.
            var post = data.filter((el) => {
                return el.id === res.value;
            })[0];
            var template = document.createElement('template');
            html = post.content.rendered.trim(); // Never return a text node of whitespace as the result
            template.innerHTML = html;
            console.log(template.content.firstChild.className);
            var content = template.content.firstChild;

            console.log(content);

            var recursive = function(el) {
                if(el.classList.contains('coronalaw__decision-tree')) {
                    return recursive(el.firstElementChild);
                } else if(el.classList.contains('coronalaw__question')) {
                    let choices = [...el.children].filter((child) => {
                        return child.classList.contains('coronalaw__choice');
                    });

                    let buttons = choices.map((choice, i) => {
                        return {
                            text: choice.firstElementChild.innerHTML,
                            value: i
                        };
                    })

                    return botui.message.bot({
                        content: el.firstElementChild.innerHTML
                    }).then(function () {
                        return botui.action.button({
                            action: buttons
                        }).then(function (res) {
                            return recursive(choices[res.value]);
                        });
                    });
                } else if(el.classList.contains('coronalaw__choice')) {
                    return recursive(el.querySelector('.coronalaw__node'));
                } else if(el.classList.contains('coronalaw__answer')) {
                    return botui.message.bot({
                        content: el.firstElementChild.innerHTML
                    });
                } else {
                    return botui.message.bot({
                        type: 'text',
                        content: el.outerHTML
                    })
                }
            }

            return recursive(content);
        });
        
    },
    error: function(error) {
      console.log(error);
    },
  });


