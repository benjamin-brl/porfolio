<script type="text/javascript">
	function base64URLencode(buffer) {
		return btoa(buffer).replace(/\+/g, '-').replace(/\//g, '_').replace(/=+$/, '');
	}

	function base64URLdecode(value) {
		return atob(value).replace(/\-/g, '+').replace(/\_/g, '/');
	}

	function autoResize() {
		$('#markdowntext').each(function() {
			$(this).on('input', function() {
				$(this).css('height', 'auto');
				$(this).css('height', $(this).prop('scrollHeight') + 'px');
			});
		});
	}

	$('[data-markdown]').each(function() {
		$(this).click(function() {
			if ($(this).parent().attr('id')) {
				var form = $(`<form method="POST" action="/updater/${base64URLencode(`${location.pathname}/${$(this).parent().attr('id')}`)}">`);
			} else {
				var form = $(`<form method="POST" action="/updater">`);
			}
			const textarea = $('<textarea class="autoResize" oninput="autoResize" id="markdowntext" name="description">');
			textarea.text(converter.makeMarkdown($(this).html().trim()));
			form.append(textarea);
			form.append($('<input type="submit" value="Enregistrer">'));
			$(this).next('#markdownedit').append(form);
			$(this).hide();
			autoResize()
		});
	});
</script>