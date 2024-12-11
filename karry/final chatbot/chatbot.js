const chatBox = document.getElementById('chat-box');
const initialButtons = document.getElementById('initial-buttons');
const followUpButtons = {
    'monthly-rent': document.getElementById('follow-up-monthly-rent'),
    'utilities-fees': document.getElementById('follow-up-utilities-fees'),
    'rules-regulations': document.getElementById('follow-up-rules-regulations'),
    'lease-duration': document.getElementById('follow-up-lease-duration'),
    'price-range': document.getElementById('follow-up-price-range'),
    'features': document.getElementById('follow-up-features'),
    
    
    // Add more follow-up button elements here for each initial question
};

const botMessages = {
    'monthly-rent': "The monthly rent for the property is $1000.",
    'utilities-fees': "Yes, the rent includes water and electricity.",
    'rules-regulations': "There are no specific rules or regulations for tenants.",
    'lease-duration': "The duration of the lease agreement is 12 months.",
    'price-range': "The price range for the property is $900 - $1200 per month.",
    'price-range-details': "The price range varies based on the size and location of the unit.",
    'price-negotiable': "The price is generally not negotiable, but exceptions can be made in certain cases.",
    'features': "Some interesting features of the place include a cold weather and a good view of Baguio.",
    'common-areas': "Common areas include a lounge, outdoor patio, and barbecue area.",
    'security-features': "Security features include 24/7 surveillance, key card access, and security guards.",
    'payment-method': "Payment methods accepted are cash, credit card, and bank transfer.",
    'late-fee': "There is a late fee of $50 for payments received after the due date.",
    'included-utilities': "Utilities included are water and electricity.",
    'additional-fees': "Additional fees include a $100 monthly maintenance fee.",
    'guest-policy': "Guests are allowed for up to 2 nights without prior approval.",
    'noise-policy': "Quiet hours are from 10 PM to 8 AM.",
    'sublease-policy': "Yes, subleasing is allowed with prior approval from the landlord.",
    'early-termination': "Yes, there is an early termination policy.",
    'sublease-terms': "The terms for subleasing include a maximum sublease period of 6 months.",
    'early-termination-fee': "There is a fee of $200 for early termination.",
    'termination-notice': "A 30-day notice is required for termination."
   
    

    // Add more bot messages here for each follow-up question
};

function addMessage(content, className) {
    const message = document.createElement('div');
    message.classList.add('chat-message');
    message.innerHTML = `<div class="${className}">${content}</div>`;
    chatBox.appendChild(message);
    chatBox.scrollTop = chatBox.scrollHeight;
}

function handleUserOption(option) {
    addMessage(option.textContent, 'user-message');
    const nextQuestion = option.getAttribute('data-next');
    if (nextQuestion) {
        const botMessage = botMessages[nextQuestion];
        addMessage(botMessage, 'bot-message');
        initialButtons.style.display = 'none';
        if (followUpButtons[nextQuestion]) {
            followUpButtons[nextQuestion].style.display = 'block';
        }
    }
}

document.querySelectorAll('.user-option').forEach(option => {
    option.addEventListener('click', () => handleUserOption(option));
});

document.querySelectorAll('.back-button').forEach(button => {
    button.addEventListener('click', () => {
        initialButtons.style.display = 'block';
        Object.values(followUpButtons).forEach(button => {
            button.style.display = 'none';
        });
    });
});
