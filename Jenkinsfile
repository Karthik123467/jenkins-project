pipeline {
    agent any
    environment {
        REPO_URL = 'https://github.com/Karthik123467/php-docker-stack-demo.git'
        CLONE_DIR = '/mnt/kumpa/php-docker-stack-demo2'
    }
    stages {
        stage('Clone Repository') {
            steps {
                script {
                    sh "rm -rf ${CLONE_DIR}" // Optional: clean up if needed
                    sh "git clone ${REPO_URL} ${CLONE_DIR}"
                }
            }
        }
        stage('Run Docker Compose') {
            steps {
                script {
                    dir(CLONE_DIR) {
                        sh "docker-compose up --build -d"
                    }
                }
            }
        }
        stage('Check Docker Logs') {
            steps {
                script {
                    dir(CLONE_DIR) {
                        sh "docker-compose logs --tail=50"
                    }
                }
            }
        }
    }
    post {
        failure {
            echo '❌ Build or deployment failed!'
        }
        success {
            echo '✅ App deployed successfully.'
        }
    }
}
