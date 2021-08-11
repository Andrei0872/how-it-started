
const modalService = () => {
    // Get DOM elements
    const d = document;
    const body = d.querySelector('body');
    const buttons = d.querySelectorAll('[data-modal-trigger]');
    
    // Attach click event to all modal triggers
    for(let button of buttons) {
        triggerEvent(button);
    }
    
    function triggerEvent(button) {
        button.addEventListener('click', () => {
        // Select the model
        const trigger = button.getAttribute('data-modal-trigger');
        const modal = d.querySelector(`[data-modal=${trigger}]`);

        const modalBody = modal.querySelector('.modal-body');
        const closeBtn = modal.querySelector('.close');
        
        closeBtn.addEventListener('click', () => modal.classList.remove('is-open'))
        // Click outside the modal
        modal.addEventListener('click', () => modal.classList.remove('is-open'))
        
        modalBody.addEventListener('click', (e) => e.stopPropagation());
    
        modal.classList.toggle('is-open');
        
        // Close modal when hitting escape
        body.addEventListener('keydown', (e) => {
            if(e.keyCode === 27) { // ESC
            modal.classList.remove('is-open')
            }
        });
        });
    }
    }
    // Call the function as soon as the document is loaded
    modalService();