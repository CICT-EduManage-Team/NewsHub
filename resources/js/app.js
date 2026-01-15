import './bootstrap';
import { initTinyMCE } from './editor';
window.initTinyMCE = initTinyMCE; // Делаем функцию доступной везде

document.addEventListener('DOMContentLoaded', function() {
    // Mobile Menu Toggle
    const mobileMenuBtn = document.querySelector('.mobile-menu-btn');
    const navMenu = document.querySelector('.nav-menu');
    const searchBtn = document.querySelector('.search-btn');
    const searchBar = document.querySelector('.search-bar');

    mobileMenuBtn?.addEventListener('click', () => {
        navMenu.style.display = navMenu.style.display === 'flex' ? 'none' : 'flex';
    });

    searchBtn?.addEventListener('click', (e) => {
        e.preventDefault();
        searchBar.style.display = searchBar.style.display === 'block' ? 'none' : 'block';
    });

    // News Filtering
    const filterButtons = document.querySelectorAll('.filter-btn');
    const newsCards = document.querySelectorAll('.news-card');

    filterButtons.forEach(button => {
        button.addEventListener('click', () => {
            // Remove active class from all buttons
            filterButtons.forEach(btn => btn.classList.remove('active'));

            // Add active class to clicked button
            button.classList.add('active');

            const filter = button.getAttribute('data-filter');

            // Filter news cards
            newsCards.forEach(card => {
                if (filter === 'all' || card.getAttribute('data-category') === filter) {
                    card.style.display = 'block';
                    setTimeout(() => {
                        card.style.opacity = '1';
                        card.style.transform = 'translateY(0)';
                    }, 100);
                } else {
                    card.style.opacity = '0';
                    card.style.transform = 'translateY(20px)';
                    setTimeout(() => {
                        card.style.display = 'none';
                    }, 300);
                }
            });
        });
    });

    // Bookmark Toggle
    const bookmarkButtons = document.querySelectorAll('.card-bookmark');

    bookmarkButtons.forEach(button => {
        button.addEventListener('click', (e) => {
            e.preventDefault();
            e.stopPropagation();

            const icon = button.querySelector('i');
            if (icon.classList.contains('far')) {
                icon.classList.remove('far');
                icon.classList.add('fas');
                button.style.background = 'var(--primary)';
                button.style.color = 'white';

                // Add animation
                button.classList.add('shake');
                setTimeout(() => {
                    button.classList.remove('shake');
                }, 500);
            } else {
                icon.classList.remove('fas');
                icon.classList.add('far');
                button.style.background = 'white';
                button.style.color = 'inherit';
            }
        });
    });

    // Load More Button
    const loadMoreBtn = document.querySelector('.load-more-btn');
    let currentItems = 3;

    if (loadMoreBtn) {
        loadMoreBtn.addEventListener('click', () => {
            const hiddenCards = Array.from(newsCards).slice(currentItems, currentItems + 3);

            hiddenCards.forEach((card, index) => {
                setTimeout(() => {
                    card.style.display = 'block';
                    setTimeout(() => {
                        card.style.opacity = '1';
                        card.style.transform = 'translateY(0)';
                    }, 50);
                }, index * 200);
            });

            currentItems += 3;

            // Hide button if no more cards
            if (currentItems >= newsCards.length) {
                loadMoreBtn.style.display = 'none';
            }
        });
    }

    // Smooth Scrolling
    document.querySelectorAll('a[href^="#"]').forEach(anchor => {
        anchor.addEventListener('click', function(e) {
            e.preventDefault();

            const targetId = this.getAttribute('href');
            if (targetId === '#') return;

            const targetElement = document.querySelector(targetId);
            if (targetElement) {
                window.scrollTo({
                    top: targetElement.offsetTop - 80,
                    behavior: 'smooth'
                });
            }
        });
    });

    // Newsletter Form Submission
    const subscribeForm = document.querySelector('.subscribe-form');

    subscribeForm?.addEventListener('submit', function(e) {
        e.preventDefault();
        const emailInput = this.querySelector('input[type="email"]');
        const button = this.querySelector('button');

        if (emailInput.value) {
            // Simulate submission
            button.innerHTML = '<i class="fas fa-check"></i>';
            button.style.background = 'var(--success)';
            emailInput.value = '';

            setTimeout(() => {
                button.innerHTML = '<i class="fas fa-paper-plane"></i>';
                button.style.background = 'var(--primary)';
            }, 2000);
        }
    });

    // Intersection Observer for Animations
    const observerOptions = {
        threshold: 0.1,
        rootMargin: '0px 0px -50px 0px'
    };

    const observer = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                entry.target.classList.add('animate');
            }
        });
    }, observerOptions);

    // Observe elements for animation
    document.querySelectorAll('.news-card, .section-header').forEach(el => {
        observer.observe(el);
    });

    // Add hover effect to news cards
    newsCards.forEach(card => {
        card.addEventListener('mouseenter', () => {
            const image = card.querySelector('.card-image img');
            if (image) {
                image.style.transform = 'scale(1.1)';
            }
        });

        card.addEventListener('mouseleave', () => {
            const image = card.querySelector('.card-image img');
            if (image) {
                image.style.transform = 'scale(1)';
            }
        });
    });
});
