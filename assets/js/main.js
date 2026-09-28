document.addEventListener('DOMContentLoaded', function () {

    /* ============================================
       1. STICKY HEADER (уменьшение + тень)
       ============================================ */
    const header = document.querySelector('.site-header');
    
    const onScrollHeader = () => {
        if (!header) return;
        header.classList.toggle('is-scrolled', window.scrollY > 50);
    };
    onScrollHeader();
    window.addEventListener('scroll', onScrollHeader, { passive: true });


    /* ============================================
       2. SCROLL SPY (подсветка активного пункта меню)
       ============================================ */
    const navLinks = document.querySelectorAll('.nav-menu a[href^="#"]');
    if (!navLinks.length) return;

    // Собираем пары "ссылка → секция"
    const sections = [];
    navLinks.forEach(link => {
        const id = link.getAttribute('href').replace('#', '');
        const section = document.getElementById(id);
        if (section) {
            sections.push({ link, section, id });
        }
    });

    if (!sections.length) return;

    // Функция обновления активного пункта
    const updateActiveLink = () => {
        const scrollPos = window.scrollY + 150; // отступ сверху (высота хедера + запас)
        
        let current = sections[0].id; // по умолчанию — первый

        sections.forEach(({ id, section }) => {
            if (section.offsetTop <= scrollPos) {
                current = id;
            }
        });

        // Убираем у всех, ставим одному
        navLinks.forEach(link => link.classList.remove('is-active'));
        const activeLink = document.querySelector(`.nav-menu a[href="#${current}"]`);
        if (activeLink) {
            activeLink.classList.add('is-active');
        }
    };

    updateActiveLink();
    window.addEventListener('scroll', updateActiveLink, { passive: true });
    window.addEventListener('resize', updateActiveLink);
});