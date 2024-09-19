!(function ($) {
    var blogprisePostMeta = blogprisePostMeta || {};

    blogprisePostMeta.overridePostMeta = function () {
        // Meta Override.
        let isPostMetaOverridden = document.getElementById(
            "blogprise-override-post-metas"
        );
        let postMetasWrapperDiv = document.querySelector(
            ".blogprise-available-post-metas"
        );
        if (isPostMetaOverridden) {
            isPostMetaOverridden.addEventListener("click", function (event) {
                if (true === event.target.checked) {
                    postMetasWrapperDiv.style.display = "block";
                } else {
                    postMetasWrapperDiv.style.display = "none";
                }
            });
        }
    };

    blogprisePostMeta.tabs = function () {
        // Tabs.
        let postMetaWrapper = document.querySelector(
            ".blogprise-meta-options-wrapper"
        );
        if (postMetaWrapper) {
            var tabLinks = document.querySelectorAll(
                ".blogprise-meta-tab-header .blogprise-tab-title"
            );
            var tabContents = document.querySelectorAll(
                ".blogprise-meta-tab-content .blogprise-tab-content"
            );

            tabLinks.forEach(function (link) {
                link.addEventListener("click", function (e) {
                    e.preventDefault();

                    // Remove active class from all tab links
                    tabLinks.forEach(function (tabLink) {
                        tabLink.classList.remove("is-active");
                    });

                    // Add active class to the clicked tab link
                    this.classList.add("is-active");

                    // Hide all tab contents
                    tabContents.forEach(function (content) {
                        content.classList.remove("is-active");
                    });

                    // Show the corresponding tab content
                    var tabId =
                        "blogprise-tab-" + this.getAttribute("data-tab");
                    document.getElementById(tabId).classList.add("is-active");
                });
            });
        }
    };

    $(document).ready(function ($) {
        blogprisePostMeta.overridePostMeta();
        blogprisePostMeta.tabs();
    });
})(jQuery);
