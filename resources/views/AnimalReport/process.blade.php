<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="{{ asset('css/report/processReport.css') }}">
    <title>Status Laporan Hewan</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

</head>
<body>
<header class="navbar">
            <a href="{{ route('profile.home') }}">Profile</a>
            <a href="{{ route('adopt.index') }}">Adoption</a>
            <a href="{{ route('fosterHome.form') }}">Foster</a>
            <a href="{{ route('donation.form') }}">Donations</a>
            <a href="{{ route('education.index') }}">Educations</a>
            <a href="{{ route('reports.create') }}"class="active">Stray Animal Report</a>
            </div>
        </div>
    </nav>
  </header>
    <div class="container">
        <div class="demo-controls">
            <h3>Demo Status Laporan Hewan</h3>
            <div class="demo-buttons">
                <button class="demo-btn active" onclick="setStatus('pending')">Pending</button>
                <button class="demo-btn" onclick="setStatus('reviewing')">Sedang Review</button>
                <button class="demo-btn" onclick="setStatus('accepted')">Diterima</button>
                <button class="demo-btn" onclick="setStatus('rejected')">Ditolak</button>
            </div>
        </div>
        <div class="status-card">
            <div id="loading" class="loading" style="display: none;">
                <div class="spinner"></div>
            </div>

            <div id="status-content">
                <div class="progress-container">
                    <div class="step">
                        <div id="step1" class="step-circle completed">
                            <i class="fa-solid fa-check"></i>
                        </div>
                        <div class="step-label">Pengisian formulir</div>
                    </div>
                    
                    <div class="connector active" id="connector1"></div>
                    
                    <div class="step">
                        <div id="step2" class="step-circle current">
                            2
                        </div>
                        <div class="step-label">Identifikasi laporan</div>
                    </div>
                    
                    <div class="connector" id="connector2"></div>
                    
                    <div class="step">
                        <div id="step3" class="step-circle pending">
                            3
                        </div>
                        <div class="step-label">Status Laporan</div>
                    </div>
                </div>

                <div class="status-content">
                    <h2 id="status-title" class="status-title">Terima kasih telah melapor!</h2>
                    <p id="status-description" class="status-description">
                        Tim shelter kami akan menghubungi Anda dalam 1-3 hari kerja untuk proses verifikasi lebih lanjut
                    </p>
                    
                    <div id="admin-notes" class="admin-notes" style="display: none;">
                        <h4>Catatan dari Admin:</h4>
                        <p id="admin-notes-text"></p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <input type="hidden" id="report-id" value="123">

    <script>
        const icons = {
            checkmark: `<i class="fa-solid fa-check"></i>`,
            cross: `<i class="fa-solid fa-xmark"></i>`
        };

        const statusConfig = {
            pending: {
                title: "Terima kasih telah melapor!",
                description: "Tim shelter kami akan menghubungi Anda dalam 1-3 hari kerja untuk proses verifikasi lebih lanjut",
                steps: {
                    step1: { class: "completed", content: icons.checkmark },
                    step2: { class: "current pulse", content: "2" },
                    step3: { class: "pending", content: "3" }
                },
                connectors: {
                    connector1: "active",
                    connector2: ""
                }
            },
            reviewing: {
                title: "Laporan sedang di seleksi",
                description: "Tim kami sedang menyeleksi laporan kelayakan mohon bersabar untuk menunggu hasil selama 24 jam!",
                steps: {
                    step1: { class: "completed", content: icons.checkmark },
                    step2: { class: "completed", content: icons.checkmark },
                    step3: { class: "current pulse", content: "3" }
                },
                connectors: {
                    connector1: "active",
                    connector2: "active"
                }
            },
            accepted: {
                title: "Laporan anda lulus seleksi!",
                description: "Terima kasih telah melapor, tim shelter akan segera menjemput hewan tersebut hari ini!",
                steps: {
                    step1: { class: "completed", content: icons.checkmark },
                    step2: { class: "completed", content: icons.checkmark },
                    step3: { class: "completed", content: icons.checkmark }
                },
                connectors: {
                    connector1: "active",
                    connector2: "active"
                }
            },
            rejected: {
                title: "Maaf laporan anda tidak lulus seleksi..",
                description: "Laporan Anda sangat berarti. Namun, berdasarkan standar penanganan kami, hewan yang dilaporkan belum memenuhi kriteria untuk dipindahkan ke shelter secara mendesak. Penanganan diprioritaskan untuk hewan dalam kondisi sakit parah, terluka, atau berada dalam lingkungan berbahaya. Terima kasih atas pengertiannya.",
                steps: {
                    step1: { class: "completed", content: icons.checkmark },
                    step2: { class: "completed", content: icons.checkmark },
                    step3: { class: "rejected", content: icons.cross }
                },
                connectors: {
                    connector1: "active",
                    connector2: "active" 
                }
            }
        };

        let currentStatus = 'pending';
        let pollingInterval;

        document.addEventListener('DOMContentLoaded', function() {
            const reportId = document.getElementById('report-id').value;
            if (reportId && reportId !== '123') {
                fetchReportStatus(reportId);
                startPolling(reportId);
            } else {
                updateStatusDisplay('pending');
            }
        });

        async function fetchReportStatus(reportId) {
            try {
                showLoading(true);
                const response = await fetch(`/api/reports/${reportId}/status`, {
                    headers: {
                        'Accept': 'application/json',
                        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content
                    }
                });
                
                if (!response.ok) {
                    throw new Error(`HTTP error! status: ${response.status}`);
                }
                
                const data = await response.json();
                updateStatusDisplay(data.status, data.admin_notes);
                showLoading(false);
            } catch (error) {
                console.error('Error fetching status:', error);
                showError('Gagal memuat status laporan. Silakan refresh halaman.');
                showLoading(false);
            }
        }

        function startPolling(reportId) {
            pollingInterval = setInterval(() => {
                fetchReportStatus(reportId);
            }, 30000);
        }

        function stopPolling() {
            if (pollingInterval) {
                clearInterval(pollingInterval);
            }
        }

        function updateStatusDisplay(status, adminNotes = '') {
            if (!statusConfig[status]) {
                console.error('Unknown status:', status);
                return;
            }

            currentStatus = status;
            const config = statusConfig[status];

            document.getElementById('status-title').textContent = config.title;
            document.getElementById('status-description').textContent = config.description;

            Object.keys(config.steps).forEach(stepId => {
                const stepElement = document.getElementById(stepId);
                const stepConfig = config.steps[stepId];
                stepElement.className = `step-circle ${stepConfig.class}`;
                stepElement.innerHTML = stepConfig.content;
            });

            Object.keys(config.connectors).forEach(connectorId => {
                const connectorElement = document.getElementById(connectorId);
                connectorElement.className = `connector ${config.connectors[connectorId]}`;
            });

            const adminNotesDiv = document.getElementById('admin-notes');
            if (adminNotes && adminNotes.trim()) {
                document.getElementById('admin-notes-text').textContent = adminNotes;
                adminNotesDiv.style.display = 'block';
            } else {
                adminNotesDiv.style.display = 'none';
            }

            updateDemoButtons(status);
        }

        function setStatus(status) {
            updateStatusDisplay(status);
        }

        function updateDemoButtons(activeStatus) {
            document.querySelectorAll('.demo-btn').forEach(btn => {
                btn.classList.remove('active');
            });
            
            const statusMap = {
                'pending': 0,
                'reviewing': 1,
                'accepted': 2,
                'rejected': 3
            };
            
            const buttons = document.querySelectorAll('.demo-btn');
            if (buttons[statusMap[activeStatus]]) {
                buttons[statusMap[activeStatus]].classList.add('active');
            }
        }

        function showLoading(show) {
            const loading = document.getElementById('loading');
            const content = document.getElementById('status-content');
            
            if (show) {
                loading.style.display = 'flex';
                content.style.display = 'none';
            } else {
                loading.style.display = 'none';
                content.style.display = 'block';
            }
        }

        function showError(message) {
            const statusTitle = document.getElementById('status-title');
            const statusDescription = document.getElementById('status-description');
            
            statusTitle.textContent = 'Terjadi Kesalahan';
            statusDescription.textContent = message;
            statusTitle.style.color = '#ef4444';
        }

        window.addEventListener('beforeunload', function() {
            stopPolling();
        });

        if ('Notification' in window && Notification.permission === 'default') {
            Notification.requestPermission();
        }

        function showNotification(status) {
            if ('Notification' in window && Notification.permission === 'granted') {
                const notifications = {
                    'accepted': {
                        title: 'Laporan Diterima!',
                        body: 'Tim rescue akan segera menjemput hewan tersebut.'
                    },
                    'rejected': {
                        title: 'Status Laporan',
                        body: 'Laporan Anda tidak memenuhi kriteria saat ini.'
                    }
                };

                if (notifications[status]) {
                    new Notification(notifications[status].title, {
                        body: notifications[status].body,
                        icon: '/favicon.ico'
                    });
                }
            }
        }
    </script>
</body>
</html>