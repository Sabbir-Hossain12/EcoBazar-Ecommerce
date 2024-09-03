    // Shop-page filtering list options
    document.addEventListener('DOMContentLoaded', function() {
        let filterToggleTitles = document.querySelectorAll('.filter-toggle-title');
        let bulkListData = document.querySelectorAll('.bulk-list-data');

        // Set initial max-height for all bulk-list-data elements
        bulkListData.forEach((data) => {
            data.style.minHeight = data.scrollHeight + 'px';
        });

        filterToggleTitles.forEach((toggleTitle, index) => {
            toggleTitle.addEventListener('click', function() {
                let data = bulkListData[index];

                if (data.classList.contains('bulk_active')) {
                    // Expand the element
                    data.style.minHeight = data.scrollHeight + 'px';
                } else {
                    // Collapse the element
                    data.style.minHeight = '0px';
                }

                data.classList.toggle('bulk_active');
                toggleTitle.classList.toggle('bulk_active');
            });
        });
    });