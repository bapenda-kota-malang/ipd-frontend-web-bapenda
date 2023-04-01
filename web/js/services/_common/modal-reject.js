const onHandleModal = (event) => {
  event.preventDefault()
  const target = event.target
  const dataTarget = target.getAttribute('data-target')
  if (dataTarget) {
    let el = document.querySelector(dataTarget)
    if (!el) return
    $(dataTarget).modal('show')
  }
}

const onHandleModalClose = (event) => {
  event.preventDefault()
  const target = event.target
  const dataTarget = target.getAttribute('data-target')
  if (dataTarget) {
    let el = document.querySelector(dataTarget)
    if (!el) return
    $(dataTarget).modal('hide')
  }
}
