$(document).ready ->
  loading = $('body').find('.page-loading-overlay')
  if loading.length
    $(window).load ->
      loading.addClass 'loaded'
      return

  window.onerror = ->
    # failsafe remove loading overlay
    loading.addClass 'loaded'
    return

  return