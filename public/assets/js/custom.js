Livewire.on('showBaseModal', params => {
    $('.modal').modal('show');
})

Livewire.on('hideBaseModal', params => {
    $('.modal').modal('hide');
})

Livewire.on('showBaseToast', message => {
    $('.toast').toast('show');
})
