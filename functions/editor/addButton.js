(function() {
	tinymce.PluginManager.add('addButton', function(editor, url) {
		editor.addButton('addButton', {
			text: 'Button',
			icon: false,
			onclick: function() {
				editor.windowManager.open({
					title: 'Add a Button',
					body: [{
							type: 'textbox', 
							name: 'text', 
							label: 'Text'
						}, {
							type: 'textbox',
							name: 'link',
							label: 'Link',
						}, {
		                    type: 'checkbox',
		                    name: 'checkbox',
		                    label: 'New Tab/Window?',
		                    text: '',
		                    checked: false,
		                },
					],
					onsubmit: function(event) {
						var text = event.data.text
						var link = event.data.link
						var checkbox = event.data.checkbox
						var newTab = checkbox ? 'target="_blank"' : ''
						var html = []
						html.push('<div class="button__container">')
						html.push('<a href="' + link + '" ' + newTab + ' class="button">' + text + '</a>')
						html.push('</div>')
						editor.execCommand('mceReplaceContent', false, html.join(''))
					}
				})
			}
		})
	})
})()
