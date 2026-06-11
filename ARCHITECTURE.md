# Fire Academy LMS - Architecture & Development Roadmap

## 1. System Architecture Overview

```
┌─────────────────────────────────────────────────────────────┐
│                      FIRE ACADEMY LMS                        │
├─────────────────────────────────────────────────────────────┤
│  Frontend Layer                                              │
│  ├── Laravel Blade + Tailwind CSS + Alpine.js               │
│  ├── Mobile-First Responsive Design                         │
│  ├── PWA Service Worker                                     │
│  └── REST API (for mobile apps / external clients)          │
├─────────────────────────────────────────────────────────────┤
│  Application Layer                                           │
│  ├── Controllers (thin, delegating to services)             │
│  ├── Service Layer (business logic)                         │
│  ├── Repository Layer (data access)                         │
│  ├── Event/Listener System                                  │
│  ├── Queue Jobs (heavy processing)                          │
│  └── Middleware (auth, rate-limiting, RBAC)                 │
├─────────────────────────────────────────────────────────────┤
│  Domain Layer                                                │
│  ├── Models (Eloquent with relationships)                   │
│  ├── Policies (authorization)                               │
│  ├── Form Requests (validation)                             │
│  └── Resources (API transformers)                           │
├─────────────────────────────────────────────────────────────┤
│  Infrastructure Layer                                        │
│  ├── MySQL/MariaDB (InnoDB, foreign keys, indexing)         │
│  ├── Redis (caching, sessions, queues)                      │
│  ├── File Storage (local/S3)                                │
│  ├── AI Integration (Gemini/OpenAI APIs)                    │
│  └── Payment Gateway (Razorpay)                             │
└─────────────────────────────────────────────────────────────┘
```

## 2. Database Design (Enhanced from existing schema)

### Core Tables:
| Table | Purpose |
|-------|---------|
| users | All user accounts with role-based access |
| roles | Role definitions (super_admin, admin, instructor, student) |
| permissions | Granular permissions |
| role_permission | Pivot table |
| user_profiles | Extended profile data |
| student_profiles | Student-specific education data |
| instructor_profiles | Instructor qualifications/designations |

### Course System:
| Table | Purpose |
|-------|---------|
| categories | Course categories (Fire Safety, Industrial, etc.) |
| courses | Main course entity |
| course_modules | Module breakdown within courses |
| lessons | Individual lessons within modules |
| lectures | Video/content lectures within lessons |
| assignments | Course assignments |
| course_enrollments | User-course enrollment tracking |
| course_progress | Granular progress tracking |
| course_reviews | Ratings and reviews |

### Quiz & Exam:
| Table | Purpose |
|-------|---------|
| quizzes | Quiz/exam definitions |
| questions | Question bank |
| question_options | Answer options (supports MCQ/multiple-answer) |
| quiz_attempts | Student attempt records |
| quiz_results | Final results |

### Certificates:
| Table | Purpose |
|-------|---------|
| certificates | Issued certificates |
| certificate_templates | Reusable templates |
| certificate_verifications | QR-based verification log |

### Payments:
| Table | Purpose |
|-------|---------|
| orders | Purchase orders |
| payments | Payment transactions (Razorpay) |
| coupons | Discount coupons |
| invoices | Generated invoices |

### AI & Content:
| Table | Purpose |
|-------|---------|
| ai_conversations | Chat history with Fire AI |
| ai_prompts | Prompt templates |
| knowledge_base | RAG knowledge documents |

### System:
| Table | Purpose |
|-------|---------|
| notifications | Laravel notifications |
| blogs | Blog posts |
| blog_categories | Blog categorization |
| testimonials | User testimonials |
| settings | System settings |
| audit_logs | Activity logging |
| login_logs | Security logs |
| blocked_ips | IP blocking |

## 3. Folder Structure

```
fire-academy/
├── app/
│   ├── Console/Commands/          # Artisan commands
│   ├── Events/                    # Domain events
│   ├── Exceptions/                # Custom exceptions
│   ├── Http/
│   │   ├── Controllers/
│   │   │   ├── Api/               # REST API controllers
│   │   │   ├── Admin/             # Admin panel controllers
│   │   │   ├── Instructor/        # Instructor controllers
│   │   │   ├── Student/           # Student controllers
│   │   │   └── Web/               # Public website controllers
│   │   ├── Middleware/            # Custom middleware
│   │   ├── Requests/              # Form request validation
│   │   └── Resources/            # API resources
│   ├── Jobs/                      # Queue jobs
│   ├── Listeners/                 # Event listeners
│   ├── Mail/                      # Mailable classes
│   ├── Models/                    # Eloquent models
│   ├── Notifications/             # Notification classes
│   ├── Policies/                  # Authorization policies
│   ├── Providers/                 # Service providers
│   ├── Repositories/              # Repository interfaces & implementations
│   │   ├── Contracts/             # Repository interfaces
│   │   └── Eloquent/             # Eloquent implementations
│   └── Services/                  # Business logic services
│       ├── AI/                    # AI integration services
│       ├── Certificate/           # Certificate generation
│       ├── Course/                # Course management
│       ├── Payment/               # Payment processing
│       └── Quiz/                  # Quiz management
├── config/                        # Configuration files
├── database/
│   ├── factories/                 # Model factories
│   ├── migrations/                # Database migrations
│   └── seeders/                   # Database seeders
├── public/
│   ├── assets/                    # Compiled assets
│   ├── images/                    # Static images
│   └── sw.js                      # Service worker (PWA)
├── resources/
│   ├── css/                       # Tailwind CSS
│   ├── js/                        # Alpine.js components
│   └── views/
│       ├── admin/                 # Admin views
│       ├── auth/                  # Authentication views
│       ├── components/            # Blade components
│       ├── emails/                # Email templates
│       ├── instructor/            # Instructor views
│       ├── layouts/               # Layout templates
│       ├── student/               # Student views
│       └── web/                   # Public website views
├── routes/
│   ├── api.php                    # API routes
│   ├── web.php                    # Web routes
│   ├── admin.php                  # Admin routes
│   ├── instructor.php             # Instructor routes
│   └── student.php                # Student routes
├── storage/                       # File storage
└── tests/                         # Test suite
```

## 4. Implementation Phases

### Phase 1: Foundation (Current)
- [x] Laravel 12 project setup
- [ ] Database schema & migrations
- [ ] Models with relationships
- [ ] Repository pattern setup
- [ ] Service layer scaffolding
- [ ] Authentication system (JWT + session)
- [ ] RBAC (roles & permissions)

### Phase 2: Public Website
- [ ] Layouts & components
- [ ] Homepage with all sections
- [ ] About, Contact, FAQ pages
- [ ] Course catalog (public)
- [ ] Blog system
- [ ] SEO optimization

### Phase 3: Core Features
- [ ] Student dashboard
- [ ] Instructor dashboard
- [ ] Admin dashboard
- [ ] Course CRUD system
- [ ] Module/Lesson/Lecture hierarchy

### Phase 4: Learning System
- [ ] Video player integration
- [ ] Progress tracking
- [ ] Quiz & exam engine
- [ ] Certificate generation
- [ ] Assignment system

### Phase 5: Business & AI
- [ ] Payment integration (Razorpay)
- [ ] Fire AI assistant
- [ ] Notification system
- [ ] Analytics & reports

### Phase 6: Production
- [ ] PWA setup
- [ ] Performance optimization
- [ ] Security hardening
- [ ] Deployment configuration

## 5. Color System & Design Tokens

```css
:root {
    --primary: #2B1810;
    --secondary: #FF6B00;
    --accent: #FFD700;
    --background: #0F0F0F;
    --card: #1A1A1A;
    --text: #FFFFFF;
    --text-muted: #9CA3AF;
    --success: #10B981;
    --danger: #EF4444;
    --warning: #F59E0B;
}
```

Typography: Poppins (headings) + Inter (body)

## 6. API Architecture

All API endpoints follow RESTful conventions:
- `GET /api/v1/courses` — List courses
- `POST /api/v1/courses` — Create course
- `GET /api/v1/courses/{id}` — Show course
- `PUT /api/v1/courses/{id}` — Update course
- `DELETE /api/v1/courses/{id}` — Delete course

Authentication: JWT Bearer tokens for API, session-based for web.
