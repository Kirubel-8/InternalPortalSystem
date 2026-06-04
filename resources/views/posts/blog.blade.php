<style>
    /* Ensure all columns have equal height */
    .row-equal-height {
        display: flex;
        flex-wrap: wrap;
        justify-content: center;
    }
    .row-equal-height > [class*='col-'] {
        display: flex;
        flex-direction: column;
    }
    
    .announcement-card {
        background: white;
        border-radius: 10px;
        overflow: hidden;
        box-shadow: 0 2px 10px rgba(0,0,0,0.05);
        transition: transform 0.3s, box-shadow 0.3s;
        display: flex;
        flex-direction: column;
        height: 100%;
        width: 100%;
    }
    
    .announcement-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 10px 30px rgba(0,0,0,0.1);
    }
    
    .blog-image {
        position: relative;
        height: 200px;
        overflow: hidden;
        flex-shrink: 0;
    }
    
    .blog-image img {
        width: 100%;
        height: 100%;
        object-fit: cover;
    }
    
    .blog-lable {
        position: absolute;
        top: 15px;
        right: 15px;
        background: rgba(67, 93, 125, 0.9);
        padding: 6px 10px;
        border-radius: 5px;
        text-align: center;
        color: white;
        z-index: 10;
    }
    
    .blog-lable .date {
        font-size: 18px;
        font-weight: bold;
        line-height: 1;
    }
    
    .blog-lable .month {
        font-size: 10px;
        text-transform: uppercase;
    }
    
    .blog-content {
        flex: 1;
        display: flex;
        flex-direction: column;
        padding-bottom: 15px;
    }
    
    .blog-content h3 {
        padding: 15px 15px 0;
        font-size: 16px;
        margin: 0;
        min-height: 55px;
        line-height: 1.4;
    }
    
    .blog-content h3 a {
        color: #333;
        text-decoration: none;
    }
    
    .blog-content .blog-text {
        padding: 10px 15px;
        color: #666;
        line-height: 1.6;
        flex: 1;
        min-height: 70px;
        font-size: 13px;
        display: -webkit-box;
        -webkit-line-clamp: 3;
        -webkit-box-orient: vertical;
        overflow: hidden;
        text-overflow: ellipsis;
    }
    
    .read-more-btn {
        margin: 5px 15px 15px;
        display: inline-block;
        background: #435d7d;
        color: white;
        padding: 8px 15px;
        border-radius: 5px;
        cursor: pointer;
        transition: background 0.3s;
        border: none;
        width: calc(100% - 30px);
        text-align: center;
        font-size: 13px;
    }
    
    .read-more-btn:hover {
        background: #ff9800;
    }
    
    /* Modal styles */
    .modal-body img {
        max-width: 100%;
        height: auto;
        border-radius: 8px;
        margin-bottom: 20px;
    }
    
    .modal-content {
        border-radius: 10px;
    }
    
    /* Modal info box styling */
    .modal-info-box {
        background: #f8f9fc;
        border-radius: 10px;
        padding: 15px 20px;
        margin-bottom: 20px;
        display: flex;
        flex-wrap: wrap;
        gap: 20px;
        border: 1px solid #e3e6f0;
    }
    
    .modal-info-item {
        display: flex;
        align-items: center;
        gap: 10px;
    }
    
    .modal-info-item i {
        font-size: 18px;
        color: #435d7d;
    }
    
    .modal-info-item span {
        color: #555;
        font-size: 14px;
    }
    
    .modal-info-item strong {
        color: #333;
        font-weight: 600;
    }
    
    /* Content box with border - NO SCROLLBAR */
    .modal-content-box {
        background: #ffffff;
        border: 2px solid #e3e6f0;
        border-radius: 12px;
        padding: 25px;
        margin-top: 15px;
        box-shadow: 0 1px 3px rgba(0,0,0,0.05);
    }
    
    /* Content text styling */
    .modal-content-text {
        font-size: 16px;
        line-height: 1.8;
        color: #333;
        text-align: justify;
    }
    
    .modal-content-text p {
        margin-bottom: 15px;
    }
    
    /* Modal max height styles - ONLY ONE SCROLLBAR */
    .modal-max-height .modal-content {
        max-height: 90vh;
        display: flex;
        flex-direction: column;
    }

    .modal-max-height .modal-header,
    .modal-max-height .modal-footer {
        flex-shrink: 0;
    }

    .modal-max-height .modal-body {
        max-height: calc(90vh - 130px);
        overflow-y: auto;
        flex: 1;
    }

    /* Custom scrollbar for modal body (only one) */
    .modal-max-height .modal-body::-webkit-scrollbar {
        width: 6px;
    }

    .modal-max-height .modal-body::-webkit-scrollbar-track {
        background: #f1f1f1;
        border-radius: 10px;
    }

    .modal-max-height .modal-body::-webkit-scrollbar-thumb {
        background: #888;
        border-radius: 10px;
    }

    .modal-max-height .modal-body::-webkit-scrollbar-thumb:hover {
        background: #555;
    }
    
    /* 4 cards per row on large screens */
    .announcement-col {
        flex: 0 0 25%;
        max-width: 25%;
        padding: 0 15px;
        margin-bottom: 30px;
        display: flex;
    }
    
    /* Responsive breakpoints */
    @media (max-width: 1200px) {
        .announcement-col {
            flex: 0 0 33.333%;
            max-width: 33.333%;
        }
    }
    
    @media (max-width: 992px) {
        .announcement-col {
            flex: 0 0 50%;
            max-width: 50%;
        }
        .blog-image {
            height: 200px;
        }
    }
    
    @media (max-width: 768px) {
        .announcement-col {
            flex: 0 0 100%;
            max-width: 100%;
        }
        .blog-image {
            height: 220px;
        }
        .blog-content h3 {
            min-height: auto;
            font-size: 18px;
        }
        .modal-info-box {
            flex-direction: column;
            gap: 10px;
        }
        .modal-content-box {
            padding: 15px;
        }
        .modal-max-height .modal-body {
            max-height: calc(90vh - 120px);
        }
    }
    
    /* Title text truncation */
    .blog-content h3 {
        display: -webkit-box;
        -webkit-line-clamp: 2;
        -webkit-box-orient: vertical;
        overflow: hidden;
        text-overflow: ellipsis;
    }

    .container {
        max-width: 1400px !important;
    }
    
    /* Empty state styling */
    .empty-announcements {
        text-align: center;
        padding: 60px 20px;
        background: #f8f9fc;
        border-radius: 15px;
    }
    
    .empty-announcements i {
        font-size: 48px;
        color: #435d7d;
        margin-bottom: 20px;
        opacity: 0.5;
    }
    
    .empty-announcements p {
        font-size: 16px;
        color: #6c757d;
    }
</style>

<section class="section bg-light" id="blog">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="title-heading text-center">
                    <h3>Announcement</h3>
                    <div class="title-border"></div>
                    <p class="text-muted mt-3 mb-0">
                        This is internal announcement for employees of the organization.
                    </p>
                </div>
            </div>
        </div>

        <div class="row mt-5 pt-3">
            <div class="row-equal-height w-100 mx-0">
                @forelse($blogs as $blog)
                    <div class="announcement-col">
                        <div class="announcement-card">
                            <div class="blog-image">
                                @if($blog->image && file_exists(storage_path('app/public/' . $blog->image)))
                                    <img src="{{ asset('storage/' . $blog->image) }}" alt="{{ $blog->title }}">
                                @else
                                    <img src="https://via.placeholder.com/300x200?text=No+Image" alt="No Image">
                                @endif
                                <div class="blog-lable">
                                    <p class="date mb-0">{{ $blog->created_at->format('d') }}</p>
                                    <p class="month mb-0">{{ $blog->created_at->format('M') }}</p>
                                </div>
                            </div>

                            <div class="blog-content">
                                <h3>
                                    <a href="javascript:void(0);">{{ \Illuminate\Support\Str::limit($blog->title, 50) }}</a>
                                </h3>
                                <div class="blog-text">
                                    {{ \Illuminate\Support\Str::limit(strip_tags($blog->body), 100) }}
                                </div>
                                <button class="read-more-btn" onclick="openAnnouncementModal({{ $blog->id }})">
                                    <i class="fa fa-eye"></i> Show More
                                </button>
                            </div>
                        </div>
                    </div>
                @empty
                    <div class="col-12">
                        <div class="empty-announcements">
                            <i class="fa fa-newspaper-o"></i>
                            <p>No announcements found.</p>
                            <p class="small text-muted">Check back later for updates.</p>
                        </div>
                    </div>
                @endforelse
            </div>
        </div>
    </div>
</section>

<!-- Modal for Announcement Details -->
<div id="announcementModal" class="modal fade modal-max-height" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header" style="background: #435d7d; color: white;">
                <h4 class="modal-title" id="modalTitle"></h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close" style="color: white;">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body" id="modalContent">
                <div class="text-center">
                    <div class="spinner-border text-primary" role="status">
                        <span class="sr-only">Loading...</span>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

<script>
    // Store blog data in JavaScript
    const blogData = @json($blogs);

    function openAnnouncementModal(id) {
        const blog = blogData.find(b => b.id === id);
        if (!blog) return;
        
        // Set modal title
        document.getElementById('modalTitle').innerHTML = blog.title;
        
        // Create modal content
        let content = '';
        
        // Add image if exists
        if (blog.image) {
            content += `<div class="text-center mb-4">
                            <img src="/storage/${blog.image}" class="img-fluid" alt="${blog.title}" style="max-height: 400px; width: auto; border-radius: 8px;">
                        </div>`;
        }
        
        // Create date and time objects
        const createdDate = new Date(blog.created_at);
        const updatedDate = new Date(blog.updated_at);
        
        // Format date and time
        const formattedCreatedDate = createdDate.toLocaleDateString('en-US', { 
            year: 'numeric', 
            month: 'long', 
            day: 'numeric' 
        });
        const formattedCreatedTime = createdDate.toLocaleTimeString('en-US', { 
            hour: '2-digit', 
            minute: '2-digit',
            second: '2-digit'
        });
        
        const formattedUpdatedDate = updatedDate.toLocaleDateString('en-US', { 
            year: 'numeric', 
            month: 'long', 
            day: 'numeric' 
        });
        const formattedUpdatedTime = updatedDate.toLocaleTimeString('en-US', { 
            hour: '2-digit', 
            minute: '2-digit',
            second: '2-digit'
        });
        
        // Check if post was edited (created_at vs updated_at different)
        const isEdited = blog.created_at !== blog.updated_at;
        
        // Add info box with date and time
        content += `
            <div class="modal-info-box">
                <div class="modal-info-item">
                    <i class="fa fa-calendar-check-o"></i>
                    <span><strong>Published:</strong> ${formattedCreatedDate} at ${formattedCreatedTime}</span>
                </div>
                ${isEdited ? `
                <div class="modal-info-item">
                    <i class="fa fa-edit"></i>
                    <span><strong>Last Updated:</strong> ${formattedUpdatedDate} at ${formattedUpdatedTime}</span>
                </div>
                ` : ''}
                <div class="modal-info-item">
                    <i class="fa fa-clock-o"></i>
                    <span><strong>Posted:</strong> ${timeAgo(blog.created_at)}</span>
                </div>
            </div>
        `;
        
        // Add body with bordered box - NO SCROLLBAR HERE
        let bodyText = blog.body || '';
        bodyText = bodyText.replace(/\n/g, '<br>');
        content += `
            <div class="modal-content-box">
                <div class="modal-content-text">
                    ${bodyText}
                </div>
            </div>
        `;
        
        document.getElementById('modalContent').innerHTML = content;
        
        // Show modal
        $('#announcementModal').modal('show');
    }
    
    // Helper function to show time ago
    function timeAgo(dateString) {
        const date = new Date(dateString);
        const now = new Date();
        const seconds = Math.floor((now - date) / 1000);
        
        let interval = Math.floor(seconds / 31536000);
        if (interval >= 1) return interval + ' year' + (interval === 1 ? '' : 's') + ' ago';
        
        interval = Math.floor(seconds / 2592000);
        if (interval >= 1) return interval + ' month' + (interval === 1 ? '' : 's') + ' ago';
        
        interval = Math.floor(seconds / 86400);
        if (interval >= 1) return interval + ' day' + (interval === 1 ? '' : 's') + ' ago';
        
        interval = Math.floor(seconds / 3600);
        if (interval >= 1) return interval + ' hour' + (interval === 1 ? '' : 's') + ' ago';
        
        interval = Math.floor(seconds / 60);
        if (interval >= 1) return interval + ' minute' + (interval === 1 ? '' : 's') + ' ago';
        
        return 'just now';
    }

    // Handle image loading errors
    document.addEventListener('DOMContentLoaded', function() {
        const images = document.querySelectorAll('.blog-image img');
        images.forEach(img => {
            img.addEventListener('error', function() {
                this.src = 'https://via.placeholder.com/300x200?text=Image+Not+Found';
            });
        });
    });

    // Add tooltips for truncated titles
    $(document).ready(function() {
        $('.blog-content h3 a').each(function() {
            if ($(this).text().length > 50) {
                $(this).attr('title', $(this).text());
            }
        });
    });
</script>