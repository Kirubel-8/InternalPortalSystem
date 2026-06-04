<style>
    /* Ensure all columns have equal height */
    .row-equal-height {
        display: flex;
        flex-wrap: wrap;
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
    
    /* Add ellipsis for longer text */
    .blog-content .blog-text:after {
        content: '...';
        display: inline;
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
    
    /* Responsive adjustments */
    @media (max-width: 1200px) {
        .col-lg-3 {
            flex: 0 0 33.333%;
            max-width: 33.333%;
        }
    }
    
    @media (max-width: 992px) {
        .col-lg-3 {
            flex: 0 0 50%;
            max-width: 50%;
        }
        .blog-image {
            height: 200px;
        }
    }
    
    @media (max-width: 768px) {
        .col-lg-3 {
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
    }
    
    /* Title text truncation */
    .blog-content h3 {
        display: -webkit-box;
        -webkit-line-clamp: 2;
        -webkit-box-orient: vertical;
        overflow: hidden;
        text-overflow: ellipsis;
    }
</style>

<div class="row row-equal-height mt-0 pt-0">
    @forelse($blogs as $blog)
        <div class="col-lg-3 col-md-6 mb-4">
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
            <div class="text-center p-5">
                <p>No announcements found.</p>
            </div>
        </div>
    @endforelse
</div>

<!-- Modal for Announcement Details -->
<div id="announcementModal" class="modal fade" tabindex="-1" role="dialog">
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
    
    // Add date
    const date = new Date(blog.created_at);
    const formattedDate = date.toLocaleDateString('en-US', { 
        year: 'numeric', 
        month: 'long', 
        day: 'numeric' 
    });
    content += `<div style="color: #999; margin-bottom: 20px; padding-bottom: 10px; border-bottom: 1px solid #eee;">
                    <i class="fa fa-calendar"></i> Published on: ${formattedDate}
                </div>`;
    
    // Add body with line breaks and proper formatting
    let bodyText = blog.body || '';
    bodyText = bodyText.replace(/\n/g, '<br>');
    content += `<div style="font-size: 16px; line-height: 1.8;">
                    ${bodyText}
                </div>`;
    
    document.getElementById('modalContent').innerHTML = content;
    
    // Show modal
    $('#announcementModal').modal('show');
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